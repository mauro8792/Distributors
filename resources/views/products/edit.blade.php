@extends('layouts.app')

@section('title', 'Edit product')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-6 col-md-offset-8">
            <form class="form-group" method="POST" action="/products/{{$product->slug}}">
                <h2 class="text-white">Editar Linea: </h2>                
                @method('put')
                @csrf
                <div class="form-row">                
                    <div class="col-md-6 mb-4">
                        <label for="name" class="text-white">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control input-lg text-success" value="{{$product->name}}">
                    </div>
                              
                    <div class="col-md-6 mb-4">
                        <label for="distributor" class="text-white">Seleccione Distribuidor</label>
                            <select class="form-control text-success" name="distributor" id="distributor">
                                @foreach($dist as $dis)
                                    <option value="{{$dis->id}}" {{($dis->id==$product->distributor_id)?"selected":""}}>{{$dis->name}}</option>
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