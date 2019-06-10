@extends('layouts.app')
@section('title', 'Team')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>

    @endif
    <p>Distributor</p>

    <table class="table">
        <thead>
            <th scope="col">Name  </th>
            <th scope="col">Telephone</th>
            <th scope="col">Address</th>
            <th scope="col">eliminar</th>
        </thead>
        <tbody>
            
                <tr>
                    <th scope="row">{{$distributor->name}}</th>
                    <td > telefono</td>
                    <td>email</td>
                    <td><a href="/teams/{{$distributor->slug}}/edit" class="btn btn-primary">Editar..</a> </td>
                <td> <form method="POST" action="/distributors/{{$distributor->slug}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                     <button type="submit" class="btn btn-danger">Eliminar</button> </form>
                </td>
                </tr>
            
        </tbody>
    </table>
   

@endsection