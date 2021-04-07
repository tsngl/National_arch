<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function registered(){
        $users = User::all();
        return view('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request, $id){
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users', $users);

    }

    public function registerupdate(Request $request, $id){
        $users = User::find($id);
        $users->last_name = $request->input('last_name');
        $users->first_name = $request->input('first_name');
        $users->skill = $request->input('skill');
        $users->undsen_zahirgaa = $request->input('undsen_zahirgaa');
        $users->club = $request->input('club');
        $users->phone = $request->input('phone');
        $users->user_type = $request->input('user_type');
        $users->email = $request->input('email');
        $users->update();

        return redirect('/role-registered')->with('status','Амжилттай шинэчиллээ');

    }

    public function registerdelete($id){
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-registered')->with('status','Амжилттай устагалаа');
    }

}
