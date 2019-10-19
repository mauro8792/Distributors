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
    public function __construct(){
        $this->middleware('auth');
    }
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

        return view('sales.index', compact('ventas'));
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        //dd($request);
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
        return redirect()->route('sales.selectLine');
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
        $ventas=Sale::max('employee_id');
        return $ventas;

    }
    public function selectLine(){
        $products = Product::all();
        return view('sales.selectLine', compact('products'));
    }

    public function kiloForLine($id){
        $products = Product::where('id',$id)->first();
        $user = Auth::user();
        $employee = Employee::where('user_id',$user->id)->first();

        return view('sales.create', compact('products','employee'));
       
    }

    public function employeeBestSale(Request $request){
        $fecha = $request->mes;
        list($anio, $mes) = explode("-",$fecha);
        //dd($mes);        
        $ventas = Sale::select(
                                DB::raw('products.slug'),
                                DB::raw('employees.name'),
                                DB::raw('employees.lastname'),
                                DB::raw('employees.id'),
                                DB::raw('sum(kilograms * amount) as ventas'))
        ->join('employees', 'sales.employee_id','employees.id')
        ->join('products','sales.product_id','products.id')
        ->whereYear('sales.created_at', '=', $anio)
        ->whereMonth('sales.created_at', '=', $mes)
        ->groupBy('employees.id')
        ->orderby('ventas','desc')
        ->get();
        //dd($ventas);
        return view('sales.bestSales', compact('ventas'));
        //dd($ventas);
       
    }
    public function employeeBestSaleForLine(){
        
        $ventas = Sale::select(
                                DB::raw('products.slug'),
                                DB::raw('employees.name'),
                                DB::raw('employees.lastname'),
                                DB::raw('employees.id'),
                                DB::raw('sum(kilograms * amount) as ventas'))
        ->join('employees', 'sales.employee_id','employees.id')
        ->join('products','sales.product_id','products.id')
        ->groupBy('products.name','employees.id')
        ->orderby('ventas','desc')
        ->get();
        //dd($ventas);
        return view('sales.bestSales', compact('ventas'));
        
       
    }
    public function saleForEmployee( $name, $id){
        
            $em = Employee::where('id',$id)->first();           
            $ventas = Sale::where('employee_id',$em->id)->with(['employee' => function($query){
                $query->select('id', 'name','lastname');
            }])
            ->with(['product' => function($queryProduct){
                $queryProduct->select('id','name');
            }])->orderBy('created_at','asc')->get();   
            return view('sales.index', compact('ventas'));
        //dd($name);
        
    }

    
}
