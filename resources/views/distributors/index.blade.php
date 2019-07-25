@extends('layouts.app')

@section('title', 'Distributors')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-11 col-md-offset-8">
            <h2 class="t_blanco">Listado de Distribuidores</h2>

            <table class="table table-responsive">
                <thead class="thead-light">
                    <th scope="col">Nombre  </th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Domicilio</th>
                    <th scope="col" width="5%"><a href="/distribuidores/nuevo" class="btn btn-success btn-sm">Nuevo</a></th>
                    <th scope="col" width="5%"></th>
                </thead>
                <tbody class="t_blanco">
                    @foreach($dist as $dis)
                        <tr>
                            <td>{{$dis->name}}</td>
                            <td> {{$dis->telephone}}</td>
                            <td>{{$dis->address}}</td>
                            <!-- <td><a href="/distributors/{{$dis->slug}}" class="btn btn-primary">Ver más..</a> </td> -->
                            <td><a href="/distributors/{{$dis->slug}}/edit" class="btn btn-success btn-sm">&nbsp;Editar&nbsp;</a> </td>
                            <td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete{{$dis->id}}">Eliminar</button>
                        </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete{{$dis->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger">
                                    <h5 class="modal-title t_blanco" id="modalDeleteLabel">Eliminar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Desea eliminar el registro <strong>{{$dis->name}}</strong></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form method="POST" action="/distributors/{{$dis->slug}}">
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