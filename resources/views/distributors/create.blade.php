@extends('layouts.app')

@section('title', 'Create Distributor')

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
    <p>New Distributor: </p>
    <form class="form-group" method="POST" action="/distributors">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">Telephone</label>
            <input type="text" name="telephone" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        

        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 

@endsection