@extends('layouts.app')

@section('title', 'Sales')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-11 col-md-offset-8">
            <h2 class="t_blanco">Listado de Ventas</h2>
            <table class="table table-responsive">
                <thead class="thead-light">
                    <th scope="col">Empleado</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col" width="5%"><a href="/ventas/nueva" class="btn btn-success btn-sm">Nuevo</a></th>
                    <th scope="col" width=5%></th>
                </thead>
                <tbody class="t_blanco">
                    @foreach($ventas as $venta)
                        <tr>
                            <td>
                                @foreach($employees as $employee)
                                @if ($employee->id==$venta->employee_id)
                                    @php
                                        $empleado=$employee->name
                                    @endphp
                                    {{$employee->name}}
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
                                {{$venta->amount}}
                            </td>
                            <td>
                                {{$venta->date}}
                            </td>
                            <td><a href="/sales/{{$venta->id}}/edit" class="btn btn-success btn-sm">&nbsp;Editar&nbsp;</a></td>
                            <td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete{{$venta->id}}">Eliminar</button>
                        </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger">
                                    <h5 class="modal-title t_blanco" id="modalDeleteLabel">Eliminar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Desea eliminar el registro <strong>{{$empleado}} {{$producto}} {{$venta->date}}</strong></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form method="POST" action="/ventas/delete/{{$venta->id}}">
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