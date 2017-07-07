 <!--Universidad de Costa Rica
Informática Empresarial
IF7102 - Ingenieria del software
Prof. Oscar Alfaro Solis
Proyecto Inscripciones Juegos Comunales
Estudiantes:
Paula Álvarez Barrantes – B40301
Elí Hidalgo Quesada - B43429
Stephanie Rojas Alfaro – A54827
I Ciclo, 2017

Clase: specification
Vista que se encarga de crear un formulario con el fin de seleccionar el deporte, la categoría y la rama
específicos con el fin de recolectar parte de los datos de la inscripción de los participantes en el sistema-->
@extends('adminMasterPage')
@section('adminContent')

<section>
      <div class="row">


<div class="col-md-12 col-md-offset-0 text-center">
      @if (Session::has('sport'))
             <div align = "center">
             <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('sport')}}</div></div>
            @endif
            <div class="panel panel-success">
               
               <div class="panel-heading">
                 <h4 style="color: #899B82;">Deportes Registrados</h4>
               </div>
               <div class="panel-body">
                   
<div class="col-md-12">
    <div class="table-responsive">
        <table  class="table table-hover table-striped">
            <td aling="center">
               <form class="form-horizontal" role="form" method="POST" action="{{url ('searchSport/')}}" >
                        {{ csrf_field() }}
                    <div class="col-md-8">
                        <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" id="filter" placeholder='Digite el nombre del deporte' type="text" class="form-control" name="filter" value="{{ old('filter') }}" required autofocus>
                        @if ($errors->has('filter'))
                            <span class="help-block">
                                <strong>{{$errors->first('filter')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 ">
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"> </span><span>  Buscar</span></button>
                        </div>
                    </div>
                </form>
                             
            </td>
            <td align="center">
                <div class="col-md-12 ">
                    <a href="{{URL::to('insertSport/')}}"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"> </span><span>  Agregar Nuevo Deporte</span></button></a>
              </div>
            </td> 
        </div>
    </table>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-hover table-striped text-left">
            <thead>
                <th>Nombre del deporte</th>
                <th>Tipo de Deporte</th>
                <th>Máximo de atletas</th>
                <th>Estado</th>
                
                <th></th>
                <th></th>
           </thead>
            @if(count($sport) < 1)
                <div class="col-md-12">
                <td>No hay datos para mostrar</td>
            </div>
               @endif
            @foreach ($sport as $s)

                <tr>
                  <td>{{$s->nameSport}}</td>
                  @if ($s->IDSportType == 1)
                      <td>Conjunto</td>
                  @else 
                   @if ($s->IDSportType == 2)
                      <td>Individual</td>
                      @endif
                    @endif  
                    <td>{{$s->athletesAmount}}</td>
                     @if ($s->active == 1)
                      <td>Activo</td>
                  @else
                      <td>Inactivo</td>
                    @endif
                   
                 <td>
                     
                   <a href="{{URL::to('/editSport/' . $s->IDSport)}}">
                <i class="fa fa-pencil-square-o"></i> <span>Editar</span>
                <!-- <small class="label pull-right bg-red">PDF</small> -->
              </a>
                  </td>
                   @if ($s->active == 1)
                            <td>
                            <a href="{{URL::to('/deleteSport/' . $s->IDSport)}}">
                            <i class="fa fa-times"></i> <span>Desactivar</span>
                            <!-- <small class="label pull-right bg-red">PDF</small> -->
                            </a>
                           </td>
                           @else
                           <td>
                            <a href="{{URL::to('/deleteSport/' . $s->IDSport)}}">
                            <i class="fa fa-times"></i> <span>Activar</span>
                            <!-- <small class="label pull-right bg-red">PDF</small> -->
                            </a>
                           </td>
                        
                           @endif
                  <td>
                    
                  
                 </td>
                </tr>
              @endforeach
            
        </table>
         </div>
             </div>
             </div>
    </div>
</div>
 </div>
</section>
@endsection
