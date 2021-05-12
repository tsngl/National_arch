<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\UserArchive;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
        $user = DB::table('users')->count();
        $athletes = DB::table('athletes')->count();
        $competition = DB::table('competition')->count();
        $post = DB::table('post')->count();
        $male = DB::table('participate')
                ->where('gender' , 'Эр')
                ->orderByRaw('score DESC')
                ->get();
        $female = DB::table('participate')
                ->where('gender' , 'Эм')
                ->orderByRaw('score DESC')
                ->get();
        return view('admin.dashboard', compact('user', 'athletes', 'competition', 'post','male','female'));
    }
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

        $archived = new UserArchive;
        $archived->last_name = $users->last_name;
        $archived->first_name = $users->first_name;
        $archived->skill = $users->skill;
        $archived->undsen_zahirgaa = $users->undsen_zahirgaa;
        $archived->club = $users->club;
        $archived->phone = $users->phone;
        $archived->user_type = $users->user_type;
        $archived->email = $users->email;
        $archived->password = $users->password;
        $archived->save();
        
        $users->delete();
        return response()->json(['status'=>'Хэрэглэгчийг бүртгэлээс устагалаа']);
    }

    public function archived(){
        $archived = UserArchive::all();
        return view('admin.archived-user')->with('archived', $archived);
    }

    public function restore($id){
        $archived = UserArchive::findOrFail($id);

        $user = new User;
        $user->last_name = $archived->last_name;
        $user->first_name = $archived->first_name;
        $user->skill = $archived->skill;
        $user->undsen_zahirgaa = $archived->undsen_zahirgaa;
        $user->club = $archived->club;
        $user->phone = $archived->phone;
        $user->user_type = $archived->user_type;
        $user->email = $archived->email;
        $user->password = $archived->password;
        $user->save();
        
        $archived->delete();
        Session::flash('statuscode','success');
        return redirect('/users-archived')->with('status','Амжилттай сэргээгдлээ');
    }

    public function post(){
        $post = Post::all();
        $post = DB::table('post')->paginate(5);
        return view('admin.post')->with('post',$post);
    }

    public function postcreate(){
        return view('admin.post-create');
    }

    public function postsave(Request $request){
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->status = $request->input('status');
        $post->save();

        
        Session::flash('statuscode','success');
        return redirect('/post')->with('status','Нийтлэл нэмэгдлээ');
    }

    public function posted(){
        $posts = DB::table('post')->where('status', '1')->get();
        return view('welcome')->with('posts', $posts);
    }

    public function postedit(Request $request, $id){
        $post = Post::findOrFail($id);
        return view('admin.post-edit')->with('post', $post);
    }

    public function postupdate(Request $request, $id){
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->update();

        Session::flash('statuscode','success');
        return redirect('/post')->with('status','Амжилттай шинэчиллээ');
    }

    public function changestatus(Request $request, $id){
        $post = Post::findOrFail($id);

        if($post->status == 1){
            $post->status = 0;
            $post->update();

        Session::flash('statuscode','success');
        return redirect('/post')->with('status','Амжилттай устгалаа');
        }else{
            Session::flash('statuscode','info');
        return redirect('/post')->with('status','Нийтлэл устгагдсан');
        }
    }
}
