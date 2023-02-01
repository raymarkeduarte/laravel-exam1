<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Contracts\Session\Session;
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
            'username' => 'required|max:15',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $insert = DB::table('members')->insert([
            'firstName' => $validated['firstName'],
            'lastName' => $validated['lastName'],
            'username' =>  $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        if($insert)
            return view('auth.login');
        else
            return response("error sa insert", 500);
    }
}