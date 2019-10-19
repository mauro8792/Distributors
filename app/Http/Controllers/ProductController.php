<?php

namespace Distributor\Http\Controllers;
use Distributor\Distributor;
use Distributor\Product;
use Distributor\Kilogram;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $request->user()->authorizeRoles(['admin']);
        $products= Product::with(['distributor' => function($query){
            $query->select('id', 'name');
        }])->orderBy('name','asc')->get();

        return view('products.index')->withProducts($products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $dist = Distributor::all();
        $kilograms = Kilogram::all();
        //dd($kilograms);
        return view('products.create', compact('dist','kilograms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if (!Product::where('name','=',$request->input('name'))->exists()) {
        $request->user()->authorizeRoles(['admin']);
        $producto = new Product();
        $producto->name= $request->input('name');
        $producto->slug= $request->input('name');
        
        $producto->distributor()->associate($request->input('distributor'))->save();
        foreach ($request->kgs as $kilo) {
            $producto->kilograms()->attach($kilo);
            
        }
        return redirect()->route('products.index');
        }else{
            $request->session()->flash('alert-success', 'El Producto con ese nombre ya existe!');
            return redirect()->route('products.create');
            
        }
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
    public function edit(Product $product)
    {
        $dist= Distributor::all();
        $kilograms = Kilogram::all();
        return view ('products.edit', compact('product','dist','kilograms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->user()->authorizeRoles(['admin']);
        $kilograms = Kilogram::all();
        $product->name= $request->input('name');
        $product->slug=$request->input('name');
        $product->distributor()->associate($request->input('distributor'))->save();
        
        foreach ($kilograms as $kilito) {
            $product->kilograms()->detach($kilito);
            
        } 

         foreach ($request->kgs as $kilo) {
            $product->kilograms()->attach($kilo);
            
        }  

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
