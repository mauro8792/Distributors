<?php

namespace Distributor\Http\Controllers;
use Distributor\Commerce;
use Distributor\Distributor;
use Illuminate\Http\Request;
use Distributor\Http\Requests\StoreCommerceRequest;
class CommerceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comercio=Commerce::all();
        return view('commerces.index', compact('comercio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dist = Distributor::all();
        return view('commerces.create', compact ('dist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comercio = new Commerce();
        $comercio->name = $request->input('name');
        $comercio->telephone = $request->input('telephone');
        $comercio->address = $request->input('address');
        $comercio->slug = $request->input('name');
        $comercio->distributor()->associate($request->input('distributor'))->save();
        
       // $comercio->save();
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
        //
    }
}
