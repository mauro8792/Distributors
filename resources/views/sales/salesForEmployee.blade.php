@extends('layouts.app')

@section('title', 'Search Sales')

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
            <form class="form-group" method="POST" action="/ventas/searchSale">
                <h2 class="text-white">Ventas por Vendedor: </h2>                 
                @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-4">
                        <label for="employee_id" class="control-label text-white">Seleccione Vendedor</label>
                            <select class="form-control text-success" name="employee_id" id="employee_id">
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->lastname}}, {{$employee->name}}</option>
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