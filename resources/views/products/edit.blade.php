@extends('layouts.app')

@section('title', 'Edit product')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-10 col-md-offset-8">
            <form class="form-group" method="POST" action="/products/{{$product->slug}}">
                <h2 class="t_blanco">Editar Producto: </h2>                
                @method('put')
                @csrf
                <div class="form-row">                
                    <div class="col-md-6 mb-4">
                        <label for="name" class="t_blanco">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control input-lg text-success" value="{{$product->name}}">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="amount" class="t_blanco">Cantidad</label>
                        <input type="text" name="amount" id="amount" class="form-control input-lg text-success" value="{{$product->amount}}">
                    </div>
                </div>
                <div class="form-row">                
                    <div class="col-md-12 mb-4">
                        <label for="description" class="t_blanco">Descripcion</label>
                        <input type="text" name="description" id="description" class="form-control input-lg text-success" value="{{$product->description}}">
                    </div>
                </div>
                <div class="form-row">                
                    <div class="col-md-6 mb-4">
                        <label for="price" class="t_blanco">Precio</label>
                        <input type="text" name="price" id="price" class="form-control input-lg text-success" value="{{$product->price}}">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="distributor" class="t_blanco">Seleccione Distribuidor</label>
                            <select class="form-control text-success" name="distributor id="distributor">
                                @foreach($dist as $dis)
                                    <option value="{{$dis->id}}" class="form-control input-lg text-success">{{$dis->name}}</option>
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