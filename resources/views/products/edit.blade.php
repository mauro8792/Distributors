@extends('layouts.app')

@section('title', 'Edit product')

@section('content')
    <p>Product: </p>
<form class="form-group" method="POST" action="/products/{{$product->slug}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{$product->amount}}">
        </div>

        <div class="form-group">
            <label for="">Price</label>
            <input type="text" name="price" class="form-control" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control" value="{{$product->description}}">
        </div>
        <div class="form-goup">
            <label for="">Select to Distributor</label>
            
               <select name="distributor">
                   @foreach($dist as $dis)
                        <option value="{{$dis->id}}">{{$dis->name}}</option>
                    @endforeach
                </select>
        </div>
        
        

        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 

@endsection