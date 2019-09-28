<?php

namespace Distributor\Http\Controllers;
use Distributor\Employee;
use Distributor\Sale;
use Distributor\User;
use Distributor\Product;
use Distributor\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $em = Employee::where('user_id',$user->id)->first();           
            $ventas = Sale::where('employee_id',$em->id)->with(['employee' => function($query){
                $query->select('id', 'name','lastname');
            }])
            ->with(['product' => function($queryProduct){
                $queryProduct->select('id','name');
            }])->orderBy('created_at','asc')->get();        
        }else {
            $ventas = Sale::with(['employee' => function($query){
                $query->select('id', 'name','lastname');
            }])
            ->with(['product' => function($queryProduct){
                $queryProduct->select('id','name');
            }])->orderBy('created_at','asc')->get();            
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
        $employee = Employee::where('user_id',$user->id)->first();

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
        $sale = Sale::create($request->all());
        
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
    public function salesForEmployee(Request $request){
    
            $employees = Employee::all();
            return view('sales.salesForEmployee', compact('employees'));
    }
    public function searchSale(Request $request){
        
        //return "hola";
        
        //$ventas=Sale::where('employee_id',$request->input('employee_id'))->get();
        //$ventas = DB::table('sales')->select('employee_id')->get();
        $ventas=Sale::max('employee_id');
        return $ventas;

        
        
        /*
        $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
        */
    }
}
