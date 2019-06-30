@extends('layouts.app')
 
@section('title', 'Employees')

@section('content')
    <p>List of Employees</p>

    <table class="table">
        <thead>
            <th scope="col">Name  </th>
            <th scope="col">Last Name  </th>
            <th scope="col">Telephone</th>
            <th scope="col">Dni  </th>
            <th scope="col">Email</th>
            <th scope="col">Birth Date  </th>
            <th scope="col">Sexo  </th>
            <th scope="col">Commerce</th>
            <th scope="col">Edit</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach($employees as $empleado)
                
                <tr>
                    <th scope="row">{{$empleado->name}}</th>
                    <th scope="row">{{$empleado->lastname}}</th>
                    <td > {{$empleado->telephone}}</td>
                    <td > {{$empleado->dni}}</td>
                    <td > {{$empleado->email}}</td>
                    <td > {{$empleado->birthdate}}</td>
                    <td>{{$empleado->sexo}}</td>
                    <td>
                        @foreach($commerces as $Commerce)
                           @if ($empleado->commerce->id==$Commerce->id)
                                {{$Commerce->name}}
                            @endif      
                        @endforeach                
                    </td>
                    <td><a href="/employees/{{$empleado->slug}}/edit" class="btn btn-primary">Editar..</a> </td>
                    <td> <form method="POST" action="/employees/{{$empleado->slug}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                     <button type="submit" class="btn btn-danger">Eliminar</button> </form>
                     </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="/employees/create" class="btn btn-primary">Nuevo</a>
    </div>
   

@endsection