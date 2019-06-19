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
        $products= Product::all();
        $dist = Distributor::all();
        return view('products.index', compact('products','dist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
        $producto->$request->input('name');
        $producto->$request->input('amount');
        $producto->$request->input('price');
        $producto->$request->input('description');
        $producto->$request->input('slug');
        $producto->distibutor()->associate($request->input('distributor'))->save();
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
    public function edit(Product $producto)
    {
        $dist= Distributor::all();
        return view ('products.edit', compact('producto','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $producto)
    {
        $producto->$request->input('name');
        $producto->$request->input('amount');
        $producto->$request->input('price');
        $producto->$request->input('description');
        $producto->$request->input('slug');
        $producto->distibutor()->associate($request->input('distributor'))->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $producto)
    {
        $producto->delete();
        return redirect()->route('products.index');
    }
}
