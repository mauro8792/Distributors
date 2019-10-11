@extends('layouts.app')

@section('title', 'Sales')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-11 col-md-offset-8">
            <h2 class="text-white">Ranking de Ventas</h2>
            <table class="table table-responsive">
                <thead class="thead-light">
                    <th scope="col">Empleado</th>
                    <th scope="col">Linea</th>
                    <th scope="col">Kgs.</th>
                    <th scope="col" width="2%">
                        @if(Auth::user()->hasRole('user'))
                            {{-- <a href="/ventas/nueva" class="btn btn-success btn-sm">Nueva</a> --}}
                            <a href="/ventas/selectLine" class="btn btn-success btn-sm">Nueva</a>
                        @endif
                    </th>
                </thead>
                <tbody class="text-white">
                    @foreach($ventas as $venta)
                        
                        <tr>
                        <td><a href="/ventas/saleForEmployee/{{$venta->name}}/{{$venta->id}}" class="btn btn-success btn-sm">{{$venta->lastname}}, {{$venta->name}}</a></td>
                            <td>{{$venta->slug}}</td>
                            <td>{{$venta->ventas}}</td>
                            <td class="text-center"><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete{{$venta->id}}" title="Eliminar"><i class="fa fa-trash-o"></i></button>                               
                        </tr>
                                                     
                    @endforeach
                </tbody>
            </table>
            
          
        </div>   
    </div>
</div>     

@endsection