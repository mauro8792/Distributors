<?php

namespace Distributor\Http\Controllers;
use Distributor\Employee;
use Distributor\Sale;
use Distributor\User;
use Distributor\Product;
use Distributor\Distributor;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $products= Product::all();
        $employees= Employee::all();
        $dist = Distributor::all();
        $ventas = Sale::all();
        return view('sales.index', compact('dist','products','employees','ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products= Product::all();
        $employees= Employee::all();
        $employee = $employees->last();
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
        $venta->amount= $request->input('amount');
        $venta->date = $now->format('Y-m-d H:i:s');
        $venta->save();
        return 'piola';
        //return redirect()->route('salees.index');
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
