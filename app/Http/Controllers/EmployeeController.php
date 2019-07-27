<?php

namespace Distributor\Http\Controllers;
use Distributor\Employee;
use Distributor\User;
use Distributor\Commerce;
use Distributor\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $commerces=Commerce::all();
        $employees= Employee::all();
        return view('employees.index', compact('employees','commerces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        //$request->user()->authorizeRoles(['user','admin']);
       // $role_user = Role::where('name','user')->first();
        $user= User::all();
        $usuario = $user->last();
       // $usuario->roles()->attach($role_user);
        $commerce = Commerce::all();
        return view('employees.create', compact('commerce','usuario'));
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $employee = new Employee();
        $employee->name = $request->input('name1');
        $employee->lastname = $request->input('lastname1');
        $employee->telephone = $request->input('telephone');
        $employee->dni = $request->input('dni');
        $employee->email = $request->input('email1');
        $employee->birthdate = $request->input('birthdate');
        $employee->sexo = $request->input('sexo');
        $employee->slug = $request->input('name1');
        $employee->user_id= $request->input('user_id');
        $employee->commerce()->associate($request->input('commerce'))->save();

        
        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $commerce = Commerce::all(); 
        return view('employees.edit', compact('employee','commerce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->name = $request->input('name');
        $employee->lastname = $request->input('lastname');
        $employee->telephone = $request->input('telephone');
        $employee->dni = $request->input('dni');
        $employee->email = $request->input('email');
        $employee->birthdate = $request->input('birthdate');
        $employee->sexo = $request->input('sexo');
        $employee->slug = $request->input('name');
        $employee->commerce()->associate($request->input('commerce'))->save();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}