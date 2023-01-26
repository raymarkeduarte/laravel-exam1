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
            "firstName" => ['required', 'min:4'],
            "lastName" => ['required', 'min:4'],
            "userName" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('members', 'email')],
            "password" => 'required|confirmed|min:6',
        ]);
        $validated["password"] = bcrypt($validated["password"]);
        $member = Members::create($validated);
        dd($member);
        // auth()->login($member);
    }
}
