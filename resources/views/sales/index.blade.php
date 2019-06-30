@extends('layouts.app')

@section('title', 'Sales')

@section('content')
    <p>List of Sales</p>

    <table class="table">
        <thead>
            <th scope="col">id employee  </th>
            <th scope="col">id product</th>
            <th scope="col">amount</th>
            <th scope="col">date</th>
            <th scope="col">Edit</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>
                        @foreach($employees as $employee)
                        @if ($employee->id==$venta->employee_id)
                            {{$employee->name}}
                        @endif      
                        @endforeach                
                    </td>
                    <td>
                        @foreach($products as $product)
                        @if ($product->id==$venta->product_id)
                            {{$product->name}}
                        @endif      
                        @endforeach                
                    </td>
                    <td>
                        {{$venta->amount}}
                    </td>
                    <td>
                        {{$venta->date}}
                    </td>
                    <td><a href="/sales/{{$venta->id}}/edit" class="btn btn-primary">Editar..</a> </td>
                    <td> 
                        <form method="POST" action="/sales/{{$venta->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Eliminar</button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="/sales/create" class="btn btn-primary">Nuevo</a>
    </div>
   

@endsection