@extends('layouts.app')

@section('title', 'Sales')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-11 col-md-offset-8">
            @if(Auth::user()->hasRole('admin'))
                <form method="POST" action="/ventas/employeeBestSale" class="form-inline">
                  @csrf
                <div class="col-lg-5">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                             <label class="input-group-text bg-success text-white" for="inicial">Mes</label>
                        </div>
                        <input class="input-group-text bg-success text-white" type="month" name="mes" id="mes" value="2019-10">  
                        <input class="btn btn-success" type="submit" name="enviar" value="Buscar">    
                    </div>
                </div>
                </form>
            @endif
            <h2 class="text-white">Listado de Ventas</h2>
            <table class="table table-responsive">
                <thead class="thead-light">
                    <th scope="col">Empleado</th>
                    <th scope="col">Linea</th>
                    <th scope="col">Kgs.</th>
                    <th scope="col">Cant.</th>
                    <th scope="col">Fecha</th>
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
                            <td>{{$venta->employee->lastname}}, {{$venta->employee->name}}</td>
                            <td>{{$venta->product->name}}</td>
                            <td>{{$venta->kilograms}}</td>
                            <td>{{$venta->amount}}</td>
                            <td>{{$venta->created_at->format('d-m-Y')}}</td>
                            {{-- <td class="text-center"><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete{{$venta->id}}" title="Eliminar"><i class="fa fa-trash-o"></i></button>                                --}}
                        </tr>
                            <!-- Modal -->
                            {{-- <div class="modal fade" id="modalDelete{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger">
                                    <h5 class="modal-title text-white" id="modalDeleteLabel">Eliminar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Desea eliminar el registro <strong>{{$venta->employee->lastname}}, {{$venta->employee->name}} {{$venta->product->name}} {{$venta->date}}</strong></p>
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
                            </div>      --}}
                            <!-- End Modal -->                          
                    @endforeach
                </tbody>
            </table>
        <!-- @if(Auth::user()->hasRole('admin'))            
            <a href="/ventas/employeeBestSale" class="btn btn-success">Quien vendio mas</a>
            <a href="/ventas/employeeBestSaleForLine" class="btn btn-success">Quien vendio mas por linea</a>
        @endif       -->    
        </div>   
    </div>
</div>     

@endsection