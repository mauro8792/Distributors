@extends('layouts.app')

@section('title', 'Create Distributor')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-10 col-md-offset-6">
            @if($errors->any())
                <div class="alert alert danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-group" method="POST" action="/distributors">
                <h2 class="t_blanco">Nuevo Distribuidor: </h2>
                @csrf
                <div class="form-row">                  
                    <div class="col-md-8 mb-4">
                        <label for="name" class="t_blanco">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control text-success">
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <label for="telephone" class="t_blanco">Telefono</label>
                        <input type="text" name="telephone" id="telephone" class="form-control text-success">
                    </div>
                </div>
                <div class="form-row">  
                    <div class="col-md-12 mb-4">
                        <label for="address" class="t_blanco">Domicilio</label>
                        <input type="text" name="address" id="address" class="form-control text-success">
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