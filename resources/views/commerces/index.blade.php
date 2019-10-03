@extends('layouts.app')

@section('title', 'Commerces')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-11 col-md-offset-8">
            <h2 class="t_blanco">Listado de Comercios</h2>

            <table class="table table-responsive">
                <thead class="thead-light">
                    <th scope="col">Nombre  </th>
                    <th scope="col">N° Cliente  </th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Domicilio</th>
                    <th scope="col">Distribuidor</th>
                    <th scope="col" width="5%"><a href="/comercios/nuevo" class="btn btn-success btn-sm">Nuevo</a></th>
                    <th scope="col" width="5%"></th>
                </thead>
                <tbody class="t_blanco">
                    @foreach($comercio as $com)
                        <tr>
                            <td>{{$com->name}}</td>
                            <td>{{$com->numberOfClient}}</td>
                            <td>{{$com->telephone}}</td>
                            <td>{{$com->address}}</td>
                            <td>
                                @foreach($dist as $dis)
                                @if ($com->distributor->id==$dis->id)
                                    {{$dis->name}}
                                @endif      
                                @endforeach                
                            </td>
                            
                            <td><a href="/commerces/{{$com->slug}}/edit" class="btn btn-success btn-sm">&nbsp;Editar&nbsp;</a> </td>
                            <td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete{{$com->id}}">Eliminar</button>
                        </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete{{$com->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger">
                                    <h5 class="modal-title t_blanco" id="modalDeleteLabel">Eliminar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Desea eliminar el registro <strong>{{$com->name}}</strong></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form method="POST" action="/commerces/{{$com->slug}}">
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