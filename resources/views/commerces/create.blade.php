@extends('layouts.app')

@section('title', 'Create Commerce')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-10 col-md-offset-8">
            @if($errors->any())
                <div class="alert alert danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-group" method="POST" action="/commerces">
                <h2 class="t_blanco">Nuevo Comercio: </h2>                
                @csrf
                <div class="form-row">                  
                    <div class="col-md-6 mb-4">
                        <label for="name" class="t_blanco">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control input-lg text-success">
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <label for="telephone" class="t_blanco">Telefono</label>
                        <input type="text" name="telephone" id="telephone" class="form-control input-lg text-success">
                    </div>
                </div>
                <div class="form-row">  
                    <div class="col-md-6 mb-4">
                        <label for="address" class="t_blanco">Domicilio</label>
                        <input type="text" name="address" id="address" class="form-control input-lg text-success">
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <label for="distributor" class="control-label t_blanco">Seleccione Distribuidor</label>
                           <select class="form-control text-success" name="distributor" id="distributor">
                                @foreach($dist as $dis)
                                    <option value="{{$dis->id}}" class="form-control input-lg text-success">{{$dis->name}}</option>
                                @endforeach
                            </select>
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