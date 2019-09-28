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
                           <select class="form-control text-success" name="product_id" id="product_id">
                               @foreach($products as $prod)
                                    <option value="{{$prod->id}}" class="form-control input-lg text-success">{{$prod->name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-md-2 mb-4">
                        <label for="kilograms" class="control-label text-white">Kilogramos</label>
                            <select class="form-control text-success" name="kilograms" id="kilograms">
                            <option value="0.5">0.5</option> 
                            <option value="1" selected>1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="7.5">7.5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
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
