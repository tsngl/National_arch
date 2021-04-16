<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

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
        $users->email = $request->input('email');
        $users->user_type = $request->input('user_type');
        $users->password = Hash::make($request->input('password'));
        $users->update();

        Session::flash('statuscode','info');
        return redirect('/role-registered')->with('status','Амжилттай шинэчиллээ');

    }

    /**public function registerdelete($id){
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-registered')->with('status','Амжилттай устагалаа');
    }*/

    public function registercreate(){
        return view('admin.register-create');
    }

    public function store(Request $request){
        $newUser = new User;
        $newUser->last_name = $request->input('last_name');
        $newUser->first_name = $request->input('first_name');
        $newUser->skill = $request->input('skill');
        $newUser->undsen_zahirgaa = $request->input('undsen_zahirgaa');
        $newUser->club = $request->input('club');
        $newUser->phone = $request->input('phone');
        $newUser->user_type = $request->input('user_type');
        $newUser->email = $request->input('email');
        $newUser->password =Hash::make($request->input('password'));
        $newUser->save();

        /*$request->user()->fill([
            'last_name'=> ($request->last_name),
            'first_name' => ($request->first_name),
            'skill' => ($request->skill),
            'undsen_zahirgaa' => ($request->undsen_zahirgaa),
            'club' => ($request->club),
            'phone' => ($request->phone),
            'user_type' => ($request->user_type),
            'email' => ($request->email),
            'password' => Crypt::encryptString($request->password),
        ])->save();*/

        Session::flash('statuscode','success');
        return redirect('/users-info')->with('status','Шинэ хэрэглэгч амжилттай бүртгэгдлээ');
    }

    public function users(){
        $users = User::all();
        return view('admin.users-info')->with('users',$users);
    }

    public function useredit(Request $request, $id){
        $users = User::findOrFail($id);
        return view('admin.users-edit')->with('users', $users);

    }

    public function userupdate(Request $request, $id){
        $users = User::find($id);
        $users->last_name = $request->input('last_name');
        $users->first_name = $request->input('first_name');
        $users->skill = $request->input('skill');
        $users->undsen_zahirgaa = $request->input('undsen_zahirgaa');
        $users->club = $request->input('club');
        $users->phone = $request->input('phone');
        $users->update();

        Session::flash('statuscode','info');
        return redirect('/users-info')->with('status','Амжилттай шинэчиллээ');

    }

    public function userdelete($id){
        $users = User::findOrFail($id);
        $users->delete();

        Session::flash('statuscode','success');
        return redirect('/users-info')->with('status','Амжилттай устагалаа');
        //return response()->json(['status'=>'Амжилттай устагалаа']);
    }

}
