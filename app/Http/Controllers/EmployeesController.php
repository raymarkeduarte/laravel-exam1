<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index(){
        $data = Employees::all();
        return view('view', ['employees' => $data]);
    }

    public function show($email){
        $data = Employees::where('email', $email)->get();
        return view('view', ['employees' => $data]);
    }
    
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required|max:255',
            'phone' => 'required|numeric|max:11',
        ]);
        dd($validated['name']);
        $insert = DB::insert(
            'insert into employees (name, email, address, phone) 
            values(?, ?, ?, ?)', [ $validated['name'], $validated['email'], $validated['address'], $validated['phone']]
        );
        dd($insert);
        if($insert)
            return $insert;
        else
            return response("error sa insert ng employee", 500);
    }

    
}
