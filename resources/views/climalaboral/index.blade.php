@extends('Inicio.layout')

@section('historico')
<div class="box container">
    <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <!--Contenido-->
                    <div class="">
                        <div class="box-header">
                            <h3>Historico Climas</h3>
                        </div>
                        <!-- Modal -->
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive" style="width:100%;">
                                <table id="reques" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr style="font-size: 15px !important;font-weight: bold !important;background-color: #FF5733;color:#fff;">
                               
                                                <th class="text-center">Empresa</th>
                                    
                                                <th class="text-center">Nombre</th>
                                    
                                                <th class="text-center">Fecha de Creación</th>
                                    
                                                <th class="text-center">Encuestas Respondidas</th>
                                    
                                                <th class="text-center">Estado</th>
                                    
                                                <th class="text-center">Editar</th>
                                    
                                                <th class="text-center">Respuestas</th>
                                    
                                                <th class="text-center">Reporte</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                    @foreach ($historico as $climaHis)
                                        <tr class="text-left">

                                            <td>{{ $climaHis->nombre }}</td>
                            
                                            <td>{{ $climaHis->descripcion }}</td>
                            
                                            <td>{!! date('d/m/Y H:m:s', strtotime($climaHis->fecha_creacion)) !!}</td>
                            
                                            <td>{{ $climaHis->encuestas_respondidas}}</td>

                                            <td>{{ $climaHis->estado }}</td>
                                                  
                                            <td class="text-center">
                                                <button class="btn unstyled-button fa fa-search btn-sm" data-toggle="modal" data-target="#editar_historico{{ $climaHis->id}}"></button>
                                                <div class="modal fade" id="editar_historico{{ $climaHis->id}}" tabindex="-1" role="dialog" aria-labelledby="verDetalle">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #1bba46;color:#fff;">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title text-center" id="editarHisto">Editar Nombre y Estado</h4>
                                                            </div>
                                                            <br>
                                                            <div class="modal-body">
                                                                <form action="{{ route('actualizarHistorico') }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $climaHis->id }}">
                                                                    <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 ">
                                                                        <label for="sku">Estado:</label>
                                                                        <select class="form-control" name="estado" id="estado" required>
                                                                            <option value="#" disabled>Seleciona una opcion...</option>
                                                                            @if($climaHis->estado == 'Activo')
                                                                                <option value="true" selected>Activo</option>
                                                                                <option value="false" >Inactivo</option>
                                                                            @else
                                                                                <option value="true" >Activo</option>
                                                                                <option value="false" selected>Inactivo</option>   
                                                                            @endif
                                                                        </select>
                                                                    </div>   
                                                                    <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 ">
                                                                        <label for="sku">Nombre:</label>
                                                                        <input type="text" name="descripcion" class="form-control mb-2 text-center" value="{{ $climaHis->descripcion }}" >
                                                                    </div>  
                                                                    <div class="modal-footer ">
                                                                        <input type="submit" value="Actualizar" class="btn btn-success" >
                                                                    </div>
                                                                </form>
                                                            </div>       
                                                        </div>
                                                    </div>
                                                </div>                                                                                       
                                            </td>   
                            
                                            <td class="text-center">
                                                <a href="{{-- URL::action('PestanaController@edit', $climaHis->id) --}}"> 
                                                    <button class="btn btn-primary btn-xs" onclick="return confirm('Desea ver todas las respuestas?')"><i class="fa fa-fw fa-edit" ></i>Ver Respuestas</button>
                                                </a>
                                            </td>  
                            
                                            <td class="text-center">
                                                <a href="{{-- URL::action('PestanaController@edit', $climaHis->id) --}}"> 
                                                    <button class="btn btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i>Ver Reportes</button>
                                                </a>
                                            </td>             
                                        </tr>  
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <!-- /.box-body -->
                    </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <!-- DataTables -->
                <!--Fin Contenido-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection