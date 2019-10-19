<?php

namespace Distributor\Http\Controllers\Auth;

use Distributor\User;
use Distributor\Role;
use Distributor\Commerce;
use Distributor\Employee;
use Distributor\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
//use Distributor\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/sales/selectLine';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'dni' => 'required|string|max:255|unique:employees',
            'password' => 'required|string|min:6|confirmed',
            'numberOfClient' =>'required|exists:commerces,numberOfClient',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Distributor\User
     */
    protected function create(array $data)
    {   
        
        try{
            if (Commerce::where('numberOfClient','=', $data['numberOfClient'])->exists()) {
                $commerce = Commerce::where('numberOfClient', $data['numberOfClient'])->first();
                $user =User::create([
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                ]);
                $employee = new Employee();
                $employee->name = $data['name'];
                $employee->lastname = $data['lastname'];
                $employee->email = $data['email'];
                $employee->dni = $data['dni'];
                $employee->email = $data['email'];
                $employee->slug = $data['name'].$data['lastname'] ;
                $employee->user_id = $user->id;
                $employee->commerce()->associate($commerce->id)->save();
                $user->roles()->attach(Role::where('name','user')->first());
                return $user;

            }
        }catch (Exception $e) {
                //return redirect()->route('login');
                return back()->withInput()->with('error', 'There was an error...');
    }
        /* $user =User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
        ]);
        //dd(Role::where('name','user')->select('id')->first());
        $user->roles()->attach(Role::where('name','user')->first());
        return $user; */  
    }
    
    public function showRegistrationForm() {
        $commerce = Commerce::all();
        return view('auth.register', compact ('commerce'));
    }
}
