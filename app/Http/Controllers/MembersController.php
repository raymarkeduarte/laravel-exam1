<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    public function store(Request $request){
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $userName = $request->userName;
        $email = $request->email;
        $password = $request->password;
        $insert = DB::insert(
            'insert into members (firstName, lastName, userName, email, password) 
            values(?, ?, ?, ?, ?)', 
            [$firstName, $lastName, $userName, $email, bcrypt($password)]
        );
        
        if($insert)
            return view('login');
        else
            return response("error sa insert", 500);
    }
}