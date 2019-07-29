@extends('layouts.app')

@section('title', 'Products')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-11 col-md-offset-8">
            <h2 class="t_blanco">Listado de Lineas</h2>
            <table class="table table-responsive">
                <thead class="thead-light">
                    <th scope="col">Nombre</th>
                    <th scope="col">Distribuidor</th>
                    <th scope="col" width="5%"><a href="/productos/nuevo" class="btn btn-success btn-sm">Nuevo</a></th>
                    <th scope="col" width="5%"></th>
                </thead>
                <tbody class="t_blanco">
                    @foreach($products as $prod)
                        <tr>
                            <td>{{$prod->name}}</td>
                            <td>
                               {{$prod->distributor->name}}              
                            </td>
                            
                            <td><a href="/products/{{$prod->slug}}/edit" class="btn btn-success btn-sm">&nbsp;Editar&nbsp;</a></td>
                            <td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete{{$prod->id}}">Eliminar</button>
                        </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger">
                                    <h5 class="modal-title t_blanco" id="modalDeleteLabel">Eliminar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Desea eliminar el registro <strong>{{$prod->name}}</strong></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form method="POST" action="/products/{{$prod->slug}}">
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