<?php

namespace App\Http\Controllers\Assistant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Athletes;
use Session;

class AthletesController extends Controller
{
    public function athlete(){
        $athletes = Athletes::all();
        return view('assistant.dashboard')->with('athletes', $athletes);
    }
    public function athletesinfo(){
        $athletes = Athletes::all();
        return view('assistant.athletes-info')->with('athletes', $athletes);
    }
    public function athletesadd(){
        return view('assistant.new-athletes');
    }
    public function store(Request $request){
        $newAthlete = new Athletes;
        $newAthlete->last_name = $request->input('last_name');
        $newAthlete->first_name = $request->input('first_name');
        $newAthlete->gender = $request->input('gender');
        $newAthlete->skill = $request->input('skill');
        $newAthlete->undsen_zahirgaa = $request->input('undsen_zahirgaa');
        $newAthlete->club = $request->input('club');
        $newAthlete->phone = $request->input('phone');
        $newAthlete->save();

        Session::flash('statuscode','success');
        return redirect('/athletes-info')->with('status','Амжилттай бүртгэгдлээ');

    }
    public function athletesedit(Request $request, $id){
        $athletes = Athletes::findOrFail($id);
        return view('assistant.athletes-edit')->with('athletes', $athletes);
    }
    public function athletesupdate(Request $request, $id){
        $athletes = Athletes::find($id);
        $athletes->last_name = $request->input('last_name');
        $athletes->first_name = $request->input('first_name');
        $athletes->gender = $request->input('gender');
        $athletes->skill = $request->input('skill');
        $athletes->undsen_zahirgaa = $request->input('undsen_zahirgaa');
        $athletes->club = $request->input('club');
        $athletes->phone = $request->input('phone');
        $athletes->update();

        Session::flash('statuscode','info');
        return redirect('/athletes-info')->with('status','Амжилттай шинэчиллээ');

    }
    public function athletesdelete($id){
        $athletes = Athletes::findOrFail($id);
        $athletes->delete();

        return response()->json(['status'=>'Тамирчны мэдээллийг бүртгэлээс устгалаа']);
    }
}
