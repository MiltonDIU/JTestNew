<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendNotify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotifyController extends Controller
{
    public function notify(Request $request)
    {
        $list['email']='info@jtest.daffodilvarsity.edu.bd';
        event(new SendNotify($list));
        $request->session()->flash('status', 'Aww! You just clicked on the button!');
        return redirect()->back();
    }
}
