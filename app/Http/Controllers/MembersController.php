<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MembersController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            "firstName" => ['required', 'min:3'],
            "lastName" => ['required', 'min:3'],
            "userName" => ['required', 'min:3'],
            "email" => ['required', 'email', Rule::unique('members', 'email')],
            "password" => 'required|confirmed|min:6',
        ]);
        $validated["password"] = bcrypt($validated["password"]);
        $member = Members::create($validated);
        // dd($request);
        auth()->login($member);
    }
}
