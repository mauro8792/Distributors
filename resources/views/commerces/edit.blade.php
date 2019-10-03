@extends('layouts.app')

@section('title', 'Edit commerce')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-10 col-md-offset-8">
            <form class="form-group" method="POST" action="/commerces/{{$commerce->slug}}">
                <h2 class="text-white">Editar Comercio: </h2>            
                @method('put')
                @csrf
                <div class="form-row">                  
                    <div class="col-md-6 mb-4">
                        <label for="name" class="text-white">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control input-lg text-success" value="{{$commerce->name}}">
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <label for="telephone" class="text-white">Telefono</label>
                        <input type="text" name="telephone" id="telephone" class="form-control input-lg text-success" value="{{$commerce->telephone}}">
                    </div>
                </div>
                <div class="form-row">  
                    <div class="col-md-6 mb-4">
                        <label for="address" class="text-white">Domicilio</label>
                        <input type="text" name="address" id="address" class="form-control input-lg text-success" value="{{$commerce->address}}">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="distributor" class="text-white">Seleccione Distribuidor</label>
                           <select class="form-control text-success" name="distributor" id="distributor">
                                @foreach($dist as $dis)
                                    <option value="{{$dis->id}}" {{($dis->id==$commerce->distributor_id)?"selected":""}}>{{$dis->name}}</option>                                    
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="form-row">
                     <div class="col-md-6 mb-4">
                        <label for="address" class="t_blanco">Numero de Cliente</label>
                        <input type="number" name="numberOfClient" id="numberOfClient" class="form-control input-lg text-success" value="{{$commerce->numberOfClient}}">
                    </div>
                    
                </div>
                <div class="form-group text-center">                
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form> 
        </div>
    </div>
</div>
@endsection