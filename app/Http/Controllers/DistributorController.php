<?php

namespace Distributor\Http\Controllers;
use Distributor\Distributor;
use Illuminate\Http\Request;
use Distributor\Http\Requests\StoreDistributorRequest;


class DistributorController extends Controller
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
        $dist = Distributor::orderBy('name','asc')->get();
        return view('distributors.index', compact('dist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        return view ('distributors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistributorRequest $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $dist = new Distributor();
        $dist->name = $request->input('name');
        $dist->telephone = $request->input('telephone');
        $dist->address = $request->input('address');
        $dist->slug = $request->input('name');
        $dist->save();
        
        return redirect()->route('distributors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        return view('distributors.show', compact('distributor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        return view('distributors.edit', compact('distributor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
    {
        $request->user()->authorizeRoles(['admin']);
        $distributor->fill($request->all());
        $distributor->save();
        return redirect()->route('distributors.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        //$request->user()->authorizeRoles(['admin']);
        $distributor->delete();
        return redirect()->route('distributors.index');
    }
}
