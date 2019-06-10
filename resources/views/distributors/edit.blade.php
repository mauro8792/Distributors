@extends('layouts.app')

@section('title', 'Edit distributor')

@section('content')
    <p>Distributor: </p>
<form class="form-group" method="POST" action="/distributors/{{$distributor->slug}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{$distributor->name}}">
        </div>
        
        <div class="form-group">
            <label for="">Telephone</label>
            <input type="text" name="telephone" class="form-control" value="{{$distributor->telephone}}">
        </div>

        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="address" class="form-control" value="{{$distributor->address}}">
        </div>
        
        

        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 

@endsection