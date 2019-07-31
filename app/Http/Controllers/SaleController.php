<?php

namespace Distributor\Http\Controllers;
use Distributor\Employee;
use Distributor\Sale;
use Distributor\User;
use Distributor\Product;
use Distributor\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('user')){
            $user=Auth::user();
            $products=Product::all();
            $em = Employee::where('user_id',$user->id)->first();
            $employees[]=$em;
            //$dist = Distributor::all();
            $ventas=Sale::where('employee_id',$em->id)->get();
        }else {
            //$dist = Distributor::all();
            $products= Product::all();
            $employees= Employee::all();            
            $ventas = Sale::all();
        }

        return view('sales.index', compact('dist','products','employees','ventas'));
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        //$request->user()->authorizeRoles(['user']);
        $products= Product::all();
        $user = Auth::user();
        $employees= Employee::all();
        
        //$employee = Employee::where('user_id','=', $user->id)->select('id','name');
        //$employee = $employees->last();
        foreach ($employees as $empleado) {
            if($empleado->user_id == $user->id){
                $employee = $empleado;
            }
        }
        
        //$empleados = Employee::select('employees')->select('id,nombre')->where($user->id, '=', $employees->id)->first();
        //dd($employee->id);
        return view('sales.create', compact('products','employee'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = new \DateTime();
        $venta = new Sale();
        $venta->employee_id = $request->input('id_employee');
        $venta->product_id = $request->input('products');
        $venta->kilograms= $request->input('kilograms');
        $venta->amount= $request->input('amount');
        $venta->date = $now->format('Y-m-d H:i:s');
        $venta->save();
        //return 'piola';
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Sale()::find($id);
        $venta->delete();
        return redirect()->route('sales.index');
         
    }
}
