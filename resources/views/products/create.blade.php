@extends('layouts.app')

@section('title', 'Create Products')

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
                <div class="form-group text-center">                
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form> 
        </div>              
    </div>  
</div>  
@endsection