<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;

use App\Role;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
class RolesController extends Controller
{

    public function index()
    {
        $roles = Role::paginate(15);

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RoleRequest $request)
    {

        $requestData = $request->all();
        Role::create($requestData);
        Session::flash('flash_message', 'Role added!');
        return redirect(Config("authorization.route-prefix") . '/roles');

    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.edit', compact('role'));
    }

    public function update($id, Request $request)
    {

        $requestData = $request->all();

        $role = Role::findOrFail($id);
        $role->update($requestData);

        Session::flash('flash_message', 'Role updated!');

        return redirect(Config("authorization.route-prefix") . '/roles');
    }


    public function destroy($id)
    {
        Role::destroy($id);

        Session::flash('flash_message', 'Role deleted!');

        return redirect(Config("authorization.route-prefix") . '/roles');
    }
}