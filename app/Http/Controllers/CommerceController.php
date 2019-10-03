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
        //$request->user()->authorizeRoles(['admin']);
        $comercio=Commerce::orderBy('name','asc')->get();
        $dist=Distributor::all();
        //bb($dist);
        return view('commerces.index', compact('comercio','dist'));
         //return view('commerces.index', compact('comercio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$request->user()->authorizeRoles(['admin']);
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
        $comercio->numberOfClient = $request->input('numberOfClient');
        $comercio->distributor()->associate($request->input('distributor'))->save();
        return redirect()->route('commerces.index');
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
    public function edit(Commerce $commerce)
    {
        $dist = Distributor::all();
        return view('commerces.edit', compact('commerce','dist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commerce $commerce)
    {
        $commerce->name = $request->input('name');
        $commerce->telephone = $request->input('telephone');
        $commerce->address = $request->input('address');
        $commerce->slug = $request->input('name');
        $comercio->numberOfClient = $request->input('numberOfClient');
        $commerce->distributor()->associate($request->input('distributor'))->save();
        return redirect()->route('commerces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commerce $commerce)
    {
        $commerce->delete();
        return redirect()->route('commerces.index');
    }
}