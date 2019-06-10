@extends('layouts.app')

@section('title', 'Distributors')

@section('content')
    <p>List of Distributors</p>

    <table class="table">
        <thead>
            <th scope="col">Name  </th>
            <th scope="col">Telephone</th>
            <th scope="col">Address</th>
            <th scope="col">Edit</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach($dist as $dis)
                <tr>
                    <th scope="row">{{$dis->name}}</th>
                    <td > {{$dis->telephone}}</td>
                    <td>{{$dis->address}}</td>
                    <!-- <td><a href="/distributors/{{$dis->slug}}" class="btn btn-primary">Ver más..</a> </td> -->
                    <td><a href="/distributors/{{$dis->slug}}/edit" class="btn btn-primary">Editar..</a> </td>
                    <td> <form method="POST" action="/distributors/{{$dis->slug}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                     <button type="submit" class="btn btn-danger">Eliminar</button> </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   

@endsection