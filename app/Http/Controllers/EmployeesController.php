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
        return view('dashboard', ['employees' => $data]);
    }

    public function show($email){
        $data = Employees::where('email', $email)->get();
        return view('dashboard', ['employees' => $data]);
    }
    
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required|max:255'
        ]);

        $insert = DB::insert(
            'insert into employees (name, email, address, phone) 
            values(?, ?, ?, ?)', [ $validated['name'], $validated['email'], $validated['address'], $request['phone']]
        );

        if($insert)
            return $this->index();
        else
            return response("error sa insert ng employee", 500);
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required|max:255'
        ]);
        $update = DB::table('employees')
        ->where('id', $request->id)
        ->update(
            ['name' => $validated['name'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'phone' => $request['phone']
            ]
        );

        if($update)
            return $this->index();
        else
            return response("error sa update ng employee", 500);
    }    

    public function delete(Request $request){
        $deleted = DB::table('employees')->where('id', $request->id)->delete();

        if($deleted)
            return $this->index();
        else
            return response("error sa deletion ng employee", 500);
    }    
}
