@extends('layouts.app')

@section('title', 'Commerces')

@section('content')
    <p>List of Commerces</p>

    <table class="table">
        <thead>
            <th scope="col">Name  </th>
            <th scope="col">Telephone</th>
            <th scope="col">Address</th>
            <th scope="col">Distributors</th>
            <th scope="col">Edit</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach($comercio as $com)
                
                <tr>
                    <th scope="row">{{$com->name}}</th>
                    <td > {{$com->telephone}}</td>
                    <td>{{$com->address}}</td>
                    <td>
                        @foreach($dist as $dis)
                        @if ($com->distributor->id==$dis->id)
                            {{$dis->name}}
                        @endif      
                        @endforeach                
                    </td>
                    
                    <td><a href="/commerces/{{$com->slug}}/edit" class="btn btn-primary">Editar..</a> </td>
                    <td> <form method="POST" action="/commerces/{{$com->slug}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                     <button type="submit" class="btn btn-danger">Eliminar</button> </form>
                </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="/commerces/create" class="btn btn-primary">Nuevo</a>
    </div>
   

@endsection