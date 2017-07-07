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
    
    @if (Session::has('edition'))
             <div align = "center">
             <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('edition')}}</div></div>
            @endif
    
            <div class="panel panel-success">
               <div class="panel-heading">
                 <h4 style="color: #899B82;">Ediciones Registradas</h4>
               </div>
               <div class="panel-body">

<div class="col-md-12">
    <div class="table-responsive">
        <table  class="table table-hover table-striped text-center">
            <td aling="center">
               <form class="form-horizontal" role="form" method="POST" action="{{url ('searchEdition/')}}" >
                        {{ csrf_field() }}
                    <div class="col-md-8">
                        <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" id="filtrar" placeholder='Digite el año de la edición' type="text" class="form-control" name="filter" value="{{ old('filter') }}" required autofocus>
                        @if ($errors->has('filter'))
                            <span class="help-block">
                                <strong>{{$errors->first('filter')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 ">
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"> </span><span>  Buscar</span></button></a>
                        </div>
                    </div>
                </form>
                             
            </td>
            <td align="center">
                <div class="col-md-12 ">
                    <a href="{{URL::to('insertEdition/')}}"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"> </span><span>  Agregar Nueva Edición</span></button></a>
              </div>
            </td> 
        </div>
    </table>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-hover table-striped text-left">
            <thead>
                <th>Nombre de la Edición</th>
                <th>Año</th>
                <th>Inicio Inscripciones</th>
                <th>Fin Inscripciones</th>
                <th></th>
                <th></th>
           </thead>
            @if(count($edition) < 1)
                <div class="col-md-12">
                <td>No hay datos para mostrar</td>
            </div>
               @endif
           @foreach ($edition as $e)
                <tr>
                  <td>{{$e->nameEdition}}</td>
                  <td>{{$e->year}}</td>
                  <td>{{$e->startDate}}</td>
                  <td>{{$e->endDate}}</td>
                 <td>
                   <a href="{{URL::to('/editEdition/' . $e->IDEdition)}}">
                <i class="fa fa-pencil-square-o"></i> <span>Editar</span>
                <!-- <small class="label pull-right bg-red">PDF</small> -->
              </a>
                  </td>
                  <td>
                     <a href="{{URL::to('/deleteEdition/' . $e->IDEdition)}}">
                <i class="fa fa-trash-o"></i> <span>Eliminar</span>
                <!-- <small class="label pull-right bg-red">PDF</small> -->
              </a>
                  
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
