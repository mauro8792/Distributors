@extends('layouts.app')

@section('title', 'Create Products')

@section('content')
    @if($errors->any())
        <div class="alert alert danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <p>New Product: </p>
    <form class="form-group" method="POST" action="/products">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">Amount</label>
            <input type="text" name="amount" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Price</label>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control">
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