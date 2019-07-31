@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-10 col-md-offset-8">
            <form class="form-group" method="POST" action="/employees/{{$employee->slug}}">
                <h2 class="t_blanco">Editar Empleado: </h2>                
                    @method('put')
                    @csrf
                <div class="form-row">                    
                    <div class="col-md-4 mb-4">
                        <label for="name" class="t_blanco">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control input-lg text-success" value="{{$employee->name}}">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="lastname" class="t_blanco">Apellido</label>
                        <input type="text" name="lastname" id="lastname" class="form-control input-lg text-success" value="{{$employee->lastname}}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="email" class="t_blanco">Email</label>
                        <input type="email" name="email" id="email" class="form-control input-lg text-success" value="{{$employee->email}}">
                    </div>
                </div>
                <div class="form-row">    
                    <div class="col-md-4 mb-3">
                        <label for="telephone" class="t_blanco">Telefono</label>
                        <input type="text" name="telephone" id="telephone" class="form-control input-lg text-success" value="{{$employee->telephone}}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dni" class="t_blanco">Dni</label>
                        <input type="text" name="dni" id="dni" class="form-control input-lg text-success" value="{{$employee->dni}}">
                    </div>               
                    <div class="col-md-4 mb-4">
                        <label for="commerce" class="control-label t_blanco">Seleccione Comercio</label>
                           <select class="form-control text-success" name="commerce" id="commerce">
                               @foreach($commerce as $com)
                                    <option value="{{$com->id}}" class="form-control input-lg text-success">{{$com->name}}</option>
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