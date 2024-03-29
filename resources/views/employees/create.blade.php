@extends('layouts.app')

@section('title', 'Create Employee')

@section('content')
    @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
        @if(Session::has('alert-' . $msg)) 
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Cuidado! </strong>{{ Session::get('alert-' . $msg) }} ×
            </div>
        @endif 
    @endforeach
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

            <form class="form-group" method="POST" action="/employees">
                <h2 class="t_blanco">Nuevo Empleado: </h2>
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="name" class="t_blanco">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control input-lg text-success" value="{{$usuario->name}}" disabled >
                        <input type="hidden"  name="name1" value="{{$usuario->name}}">
                        <input type="hidden"  name="user_id" value="{{$usuario->id}}">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="lastname" class="t_blanco">Apellido</label>
                        <input type="text" name="lastname" id="lastname" class="form-control input-lg text-success" value="{{$usuario->lastname}}" disabled >
                        <input type="hidden"  name="lastname1" value="{{$usuario->lastname}}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="email" class="t_blanco">Email</label>
                        <input type="email" name="email" id="email" class="form-control input-lg text-success" value="{{$usuario->email}}" disabled>
                        <input type="hidden"  name="email1" value="{{$usuario->email}}">
                    </div>                    
                </div>
                <div class="form-row">            
                    <div class="col-md-4 mb-3">
                        <label for="telephone" class="t_blanco">Teléfono</label>
                        <input type="text" name="telephone" id="telephone" class="form-control input-lg text-success">
                    </div>                
                    <div class="col-md-4 mb-3">
                        <label for="dni" class="t_blanco">Dni</label>
                        <input type="text" name="dni" id="dni" class="form-control input-lg text-success">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="numberOfClient" class="control-label t_blanco">Numero de Comercio</label>
                        <input type="number" name="numberOfClient" id="numberOfClient" class="form-control input-lg text-success">
                       {{--  <select class="form-control text-success" name="commerce" id="commerce">
                           @foreach($commerce as $com)
                                <option value="{{$com->id}}" id="commerce" class="form-control input-lg text-success">{{$com->name}}</option>
                            @endforeach
                        </select> --}}
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
