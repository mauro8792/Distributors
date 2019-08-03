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
            <form class="form-group" method="POST" action="{{ action('SaleController@searchSale') }}">
                <h2 class="t_blanco">Ventas por Vendedor: </h2>                 
                @csrf
                <div class="form-row">
                   
                    <div class="col-md-6 mb-4">
                        <label for="products" class="control-label t_blanco">Select to Employee</label>
                           <select class="form-control text-success" name="employee_id" id="employee_id">
                               @foreach($employees as $employee)
                                    <option value="{{$employee->id}}" class="form-control input-lg text-success">{{$employee->name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>   
                
                <div class="form-group text-center">                
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </form> 
        </div>              
    </div>  
</div>
@endsection