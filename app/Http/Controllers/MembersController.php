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

        $validated = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'userName' => 'required|max:15',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $insert = DB::insert(
            'insert into members (firstName, lastName, userName, email, password) 
            values(?, ?, ?, ?, ?)', [ $validated['firstName'], $validated['lastName'], $validated['userName'], $validated['email'], $validated['password'] ]
        );

        if($insert)
            return view('auth.login');
        else
            return response("error sa insert", 500);
    }
}