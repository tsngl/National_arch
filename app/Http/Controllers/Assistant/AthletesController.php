<?php

namespace App\Http\Controllers\Assistant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AthletesController extends Controller
{
    public function view(){
        return view('assistant.dashboard');
    }
}
