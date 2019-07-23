@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <p>List of Products</p>

    <table class="table">
        <thead>
            <th scope="col">Name  </th>
            <th scope="col">Amount</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Distributor</th>
            <th scope="col">Edit</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach($products as $prod)
                
                <tr>
                    <th scope="row">{{$prod->name}}</th>
                    <td > {{$prod->amount}}</td>
                    <td>{{$prod->price}}</td>
                    <td>{{$prod->description}}</td>
                    <td>
                       {{$prod->distributor->name}}              
                    </td>
                    
                    <td><a href="/products/{{$prod->slug}}/edit" class="btn btn-primary">Editar..</a> </td>
                    <td> <form method="POST" action="/products/{{$prod->slug}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                     <button type="submit" class="btn btn-danger">Eliminar</button> </form>
                </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="/products/create" class="btn btn-primary">Nuevo</a>
    </div>
   

@endsection