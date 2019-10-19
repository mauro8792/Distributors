@extends('layouts.app')

@section('title', 'Create Products')

@section('content')
 <div class="container">
     @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
    
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Cuidado! </strong>{{ Session::get('alert-' . $msg) }} ×
    </div>
    @endif @endforeach
    <div class="row justify-content-center">
       <div class="col-md-8 col-md-offset-8">
            @if($errors->any())
                <div class="alert alert danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-group" method="POST" action="/products">
                <h2 class="text-white">Nuevo Linea: </h2>                
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-4">
                        <label for="name" class="text-white">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control input-lg text-success">
                    </div>
        
                    <div class="col-md-6 mb-4">
                        <label for="distributor" class="text-white">Seleccione Distribuidor</label>
                           <select class="form-control text-success" name="distributor" id="distributor">
                               @foreach($dist as $dis)
                                    <option value="{{$dis->id}}">{{$dis->name}}</option>
                                @endforeach
                            </select>
                    </div>


                </div>

                <div class="form-row">
                     <div class="col-md-12 mb-4">
                        <label for="distributor" class="text-white">Seleccione Kilogramos</label>
                            <div class="input-group-prepend">

                               @foreach($kilograms as $k)
                                <div class="input-group-text col-md-1 m-2"> 
                                    <input type="checkbox" name="kgs[]" value="{{$k->id}}">{{$k->kilogram}}
                                </div>
                                @endforeach
                                
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