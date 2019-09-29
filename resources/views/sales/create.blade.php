@extends('layouts.app')

@section('title', 'Create Sales')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-6 col-md-offset-8">
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
                <h2 class="text-white">Nueva Venta: </h2>                 
                @csrf
                <div class="form-row">
                   <div class="col-md-12 mb-4">
                        <label for="employee_id" class="text-white">Empleado</label>
                        <input type="text" name="employee_id" id="employee_id" class="form-control input-lg text-success" value="{{$employee->name}}" disabled >
                        <input type="hidden"  name="employee_id" value="{{$employee->id}}">
                    </div>
                </div>   
                <div class="form-row">
                    <div class="col-md-8 mb-4">
                        <label for="products" class="control-label text-white">Select to Line</label>
                           <select class="form-control text-success" name="product_id" id="product_id" disabled>
                               <option value="{{$products->id}}" class="form-control input-lg text-success" >{{$products->name}}</option>
                               <input type="hidden"  name="product_id" value="{{$products->id}}">
                            </select>
                    </div>
                    <div class="col-md-2 mb-4">
                        <label for="kilograms" class="control-label text-white">Kilogramos</label>
                            <select class="form-control text-success" name="kilograms" id="kilograms">
                            @foreach ($products->kilograms as $kilos)
                            <option value="{{$kilos->kilogram}}">{{$kilos->kilogram}}</option>
                            @endforeach
                             
                            
                        </select>
                    </div>
                 
                    <div class="col-md-2 mb-4">
                        <label for="amount" class="text-white">Cantidad</label>
                        <input type="text" name="amount" id="amount" class="form-control input-lg text-success">
                    </div>     
                       
                </div>
                <div class="form-group text-center">     
                    <input type="hidden"  name="date" value="{{now()}}">           
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form> 
        </div>              
    </div>  
</div>
@endsection
