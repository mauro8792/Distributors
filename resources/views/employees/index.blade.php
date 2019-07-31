@extends('layouts.app')
 
@section('title', 'Employees')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-12 col-md-offset-8">
            <h2 class="t_blanco">Listado de Empleados</h2>
            <table class="table table-responsive">
                <thead class="thead-light">
                    <th scope="col"><a href="/empleados/{{$orden}}" class="text-success" style="text-decoration:none" data-toggle="tooltip" title="Orden {{$orden}}">Nombre&nbsp;<i class="fa fa-arrow-{{($orden=='asc')?'up':'down'}}"></i></a></th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Email</th>
                    <th scope="col">Comercio</th>
                    <th scope="col" width="4%"><a href="/empleados/nuevo" class="btn btn-success btn-sm">Nuevo</a></th>
                    <th scope="col" width="4%"></th>
                </thead>
                <tbody class="t_blanco">
                    @foreach($employees as $empleado)
                        <tr>
                            <td>{{$empleado->lastname}}, {{$empleado->name}}</td>
                            <td>{{$empleado->telephone}}</td>
                            <td>{{$empleado->dni}}</td>
                            <td>{{$empleado->email}}</td>
                            <td>
                                @foreach($commerces as $Commerce)
                                   @if ($empleado->commerce->id==$Commerce->id)
                                        {{$Commerce->name}}
                                    @endif      
                                @endforeach                
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete{{$empleado->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger">
                                    <h5 class="modal-title t_blanco" id="modalDeleteLabel">Eliminar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Desea eliminar el registro <strong>{{$empleado->name}} {{$empleado->lastname}}</strong></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form method="POST" action="/employees/{{$empleado->slug}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>            
                                  </div>
                                </div>
                              </div>
                            </div>     
                            <!-- End Modal -->                             
                            <td><a href="/employees/{{$empleado->slug}}/edit" class="btn btn-success btn-sm">&nbsp;Editar&nbsp;</a> </td>
                            <td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete{{$empleado->id}}">Eliminar</button>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>   
    </div>
</div>  

@endsection