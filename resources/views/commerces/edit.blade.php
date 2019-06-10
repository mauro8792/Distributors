@extends('layouts.app')

@section('title', 'Edit commerce')

@section('content')
    <p>Commerce: </p>
<form class="form-group" method="POST" action="/commerces/{{$commerce->slug}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{$commerce->name}}">
        </div>
        
        <div class="form-group">
            <label for="">Telephone</label>
            <input type="text" name="telephone" class="form-control" value="{{$commerce->telephone}}">
        </div>

        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="address" class="form-control" value="{{$commerce->address}}">
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