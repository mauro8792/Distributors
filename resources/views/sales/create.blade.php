@extends('layouts.app')

@section('title', 'Create Sales')

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
            <form class="form-group" method="POST" action="/sales">
                <h2 class="t_blanco">Nueva Venta: </h2>                 
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-4">
                        <label for="employee" class="t_blanco">Empleado</label>
                        <input type="text" name="employee" id="employee" class="form-control input-lg text-success" value="{{$employee->name}}" disabled >
                        <input type="hidden"  name="id_employee" value="{{$employee->id}}">
                    </div>
                          
                    <div class="col-md-6 mb-4">
                        <label for="products" class="control-label t_blanco">Select to Product</label>
                           <select class="form-control text-success" name="products" id="products">
                               @foreach($products as $prod)
                                    <option value="{{$prod->id}}" class="form-control input-lg text-success">{{$prod->name}}</option>
                                @endforeach
                            </select>
                    </div>  
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-4">
                        <label for="amount" class="t_blanco">Cantidad</label>
                        <input type="text" name="amount" id="amount" class="form-control input-lg text-success">
                    </div>     
                    <div class="col-md-6 mb-4">
                        <label for="date" class="t_blanco">Fecha</label>
                        <input type="date" name="date" id="date" class="form-control input-lg text-success" value="{{ date('Y-m-d') }}">
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
