@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <p>Employee: </p>
<form class="form-group" method="POST" action="/employees/{{$employee->slug}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{$employee->name}}">
        </div>
        <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" name="lastname" class="form-control" value="{{$employee->lastname}}">
        </div>
        
        <div class="form-group">
            <label for="">Telephone</label>
            <input type="text" name="telephone" class="form-control" value="{{$employee->telephone}}">
        </div>
        <div class="form-group">
            <label for="">Dni</label>
            <input type="text" name="dni" class="form-control" value="{{$employee->dni}}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="{{$employee->email}}">
        </div>
        <div class="form-group">
            <label for="">Birth Date</label>
            <input type="text" name="birthdate" class="form-control" value="{{$employee->birthdate}}">
        </div>
        <div class="form-group">
            <label for="">Sex</label>
            <input type="text" name="sexo" class="form-control" value="{{$employee->sexo}}">
        </div>       
        <div class="form-goup">
            <label for="">Select to Commerce</label>
            
               <select name="commerce">
                   @foreach($commerce as $com)
                        <option value="{{$com->id}}">{{$com->name}}</option>
                    @endforeach
                </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 

@endsection