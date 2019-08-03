@extends('layouts.app')

@section('title', 'Sales')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-11 col-md-offset-8">
            <h2 class="text-white">Listado de Ventas</h2>
            <table class="table table-responsive">
                <thead class="thead-light">
                    <th scope="col">Empleado</th>
                    <th scope="col">Linea</th>
                    <th scope="col">Kgs.</th>
                    <th scope="col">Cant.</th>
                    <th scope="col">Fecha</th>
                    <th scope="col" width="5%">
                        @if(Auth::user()->hasRole('user'))
                            <a href="/ventas/nueva" class="btn btn-success btn-sm">Nueva</a>
                        @endif
                    </th>
                    <th scope="col" width=5%></th>
                </thead>
                <tbody class="text-white">
                    @foreach($ventas as $venta)
                        <tr>
                            <td>
                                @foreach($employees as $employee)
                                @if ($employee->id==$venta->employee_id)
                                    @php
                                        $empleado=$employee
                                    @endphp
                                    {{$employee->lastname}}, {{$employee->name}}
                                @endif      
                                @endforeach                
                            </td>
                            <td>
                                @foreach($products as $product)                            
                                @if ($product->id==$venta->product_id)
                                    @php
                                        $producto=$product->name
                                    @endphp                                   
                                    {{$product->name}}
                                @endif      
                                @endforeach                
                            </td>
                            <td>
                                {{$venta->kilograms}}
                            </td>
                            <td>
                                {{$venta->amount}}
                            </td>
                            <td>
                                {{$venta->created_at->format('d-m-Y')}}
                            </td>
                            <!--
                            <td><a href="/sales/{{$venta->id}}/edit" class="btn btn-success btn-sm">&nbsp;Editar&nbsp;</a></td>
                            -->
                            <td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete{{$venta->id}}">Eliminar</button>
                            <td></td>                                
                        </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger">
                                    <h5 class="modal-title text-white" id="modalDeleteLabel">Eliminar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Desea eliminar el registro <strong>{{$empleado->lastname}}, {{$empleado->name}} {{$producto}} {{$venta->date}}</strong></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form method="POST" action="/sales/{{$venta->slug}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>            
                                  </div>
                                </div>
                              </div>
                            </div>     
                            <!-- End Modal -->                          
                    @endforeach
                </tbody>
            </table>
        </div>   
    </div>
</div>     

@endsection