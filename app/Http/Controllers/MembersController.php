<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index(){
        $data = Members::all();
        return view('view', ['members' => $data]);
    }
}
