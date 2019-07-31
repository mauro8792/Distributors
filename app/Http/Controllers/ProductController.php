<?php

namespace Distributor\Http\Controllers;
use Distributor\Distributor;
use Distributor\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->user()->authorizeRoles(['admin']);
        $products= Product::with(['distributor' => function($query){
            $query->select('id', 'name');
        }])->orderBy('name','asc')->get();
       // $dist = Distributor::all();
        //dd($products);
        //dd($dist);
        return view('products.index')
            ->withProducts($products);

        //return view('products.index', compact('products','dist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       // $request->user()->authorizeRoles(['admin']);
        $dist = Distributor::all();
        return view('products.create', compact('dist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Product();
        $producto->name= $request->input('name');
        //$producto->amount= $request->input('amount');
        //$producto->price = $request->input('price');
        //$producto->description = $request->input('description');
        //$producto->kilograms = $request->input('kilograms');
        $producto->slug= $request->input('name');
        $producto->distributor()->associate($request->input('distributor'))->save();
        return redirect()->route('products.index');
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
        return view ('products.edit', compact('product','dist'));
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
        $product->name= $request->input('name');
       // $product->kilograms = $request->input('kilograms');
       // $product->amount=$request->input('amount');
       // $product->price=$request->input('price');
       // $product->description=$request->input('description');
        $product->slug=$request->input('name');
        $product->distributor()->associate($request->input('distributor'))->save();
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
