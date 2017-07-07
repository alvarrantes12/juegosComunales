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
    @if (Session::has('category'))
             <div align = "center">
             <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('category')}}</div></div>
            @endif
   <div class="panel panel-success">
      
      <div class="panel-heading">
         <h4 style="color: #899B82;">Categorías Registradas</h4>
      </div>
      <div class="panel-body">
         
         <div class="col-md-12">
            <div class="table-responsive">
               <table  class="table table-hover table-striped text-center"  >
                  <td aling="center">
                     <form class="form-horizontal" role="form" method="POST" action="{{url ('searchCategory/')}}">
                        {{ csrf_field() }}
                        <div class="col-md-9">
                           <input id="filtrar" pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" placeholder='Digite el nombre de la categoría o deporte' type="text" class="form-control" name="filter" value="{{ old('filter') }}" required autofocus>
                           @if ($errors->has('filter'))
                           <span class="help-block">
                           <strong>{{$errors->first('filter')}}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="form-group">
                           <div class="col-md-3 ">
                              <a><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"> </span><span>  Buscar</span></button></a>
                           </div>
                        </div>
                     </form>
                  </td>
                  <td align="center">
                     <div class="col-md-12 ">
                        <a href="{{URL::to('insertCategory/')}}"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"> </span><span>  Agregar Nueva Categoría</span></button></a>
                     </div>
                  </td>
            </div>
            </table>
         </div>
         <div class="col-md-12">
            <div class="table-responsive">
               <table class="table table-hover table-striped text-left">
                  <thead>
                     <th>Nombre de la categoría</th>
                     <th>Deporte al que pertenece</th>
                     <th>Estado</th>
                     <th>Edad mínima</th>
                     <th>Edad máxima</th>
                     <th></th>
                     <th></th>
                  </thead>
                   @if(count($category) < 1)
                 <div class="col-md-12">
                <td>No hay datos para mostrar</td>
            </div>
               @endif
                  @foreach ($category as $c)
                  <tr>
                     <td>{{$c->nameCategory}}</td>
                     <td>{{$c->nameSport}}</td>
                     @if ($c->active == 1)
                        <td>Activo</td>
                     @else
                        <td>Inactivo</td>
                     @endif
                     
                     <td>{{$c->startAge}} Años</td>
                     <td>{{$c->endAge}} Años</td>
                     
                     <td>
                        <a href="{{URL::to('/editCategory/' . $c->IDCategory)}}">
                           <i class="fa fa-pencil-square-o"></i> <span>Editar</span>
                           <!-- <small class="label pull-right bg-red">PDF</small> -->
                        </a>
                     </td>
                           @if ($c->active == 1)
                            <td>
                           <a href="{{URL::to('/deleteCategory/' . $c->IDCategory)}}">
                           <i class="fa fa-times"></i> <span>Desactivar</span>
                           <!-- <small class="label pull-right bg-red">PDF</small> -->
                           </a>
                           </td>
                           @else
                           <td>
                           <a href="{{URL::to('/deleteCategory/' . $c->IDCategory)}}">
                           <i class="fa fa-check"></i> <span>Activar</span>
                           <!-- <small class="label pull-right bg-red">PDF</small> -->
                           </td>
                        
                           @endif
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