<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;

use App\Models\Permission;
use Illuminate\Http\Request;
use Session;
use Route;
use App\Models\Role;
use App\Http\Controllers\Controller;
class PermissionsController extends Controller
{
    public function index()
    {
        $roles = Role::where('id', '>', 1)->pluck('name', 'id');
        $actions = $this->getRoutes();
        return view('admin.permissions.index', compact('roles', 'actions'));
    }

    private function getRoutes()
    {
        $actions = [];
        $routes = Route::getRoutes();
        foreach ($routes as $route) {
            if (preg_match("/^App(.*)/i", trim($route->getActionName())) == 0 ||
                preg_match("/^App\\\\Http\\\\Controllers\\\\Auth(.*)/i", trim($route->getActionName())) > 0) {
                continue;
            }
            $actionName = $route->getActionName();
            $method = $route->methods()[0];
            $action = substr($actionName, strpos($actionName, '@') + 1);
            $namespace = substr($actionName, 0, strrpos($actionName, '\\'));
            $controller = substr($actionName, strrpos($actionName, '\\') + 1, -(strlen($action) + 1));
            $actions[$namespace][$controller][$method][] = $action;
        }
        ksort($actions);
        return $actions;
    }

    public function getSelectedRoutes(Request $request) {

        if($request->ajax())
        {
            $role_id = $request->input('role_id');
            $selected = Role::findOrFail($role_id)->permissions()->select('namespace', 'controller', 'method', 'action')->get()->toArray();
            $selectedActions = [];
            foreach ($selected as $action) {
                $selectedActions[] = $action['namespace'] . '-' . $action['controller'] . '-' . $action['method'] . '-' . $action['action'];
            }
            return response()->json(compact('selectedActions'), 200);
        }
        return response()->json([
            'responseText' => 'Not a ajax request'
        ], 500);

    }

    public function update(Request $request)
    {
        $role_id = $request->input('role_id', 0);
        $actions = $request->input('actions');
        $data = [];
        if (count($actions) > 0) {
            foreach ($actions as $action) {
                $parts = explode('-', $action);
                $data[] = new Permission([
                    'namespace' => $parts[0],
                    'controller' => $parts[1],
                    'method' => $parts[2],
                    'action' => $parts[3],
                    'allowed' => 1
                ]);
            }
        }
        $role = Role::findOrFail($role_id);
        $role->permissions()->delete();
        $role->permissions()->saveMany($data);

        Session::flash('flash_message', 'Permission updated!');

        return redirect(Config("authorization.route-prefix") . '/permissions');
    }
}
