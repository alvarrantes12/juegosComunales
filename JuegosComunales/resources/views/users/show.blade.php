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

Clase: users
Vista que se encarga de crear un formulario con el fin de mostrar los atletas inscritos-->
@extends('adminMasterPage')
@section('adminContent')
<div class="col-md-12 col-md-offset-0 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Usuarios Registados</h4>
               </div>
               <div class="panel-body">
                  
<div class="col-md-12">
   <div class="table-responsive">
      <table  class="table table-hover table-striped">
         <td aling="center">
            <form class="form-horizontal" role="form" method="POST" >
               {{ csrf_field() }}
               <div class="col-md-8">
                  <input id="filtrar" placeholder='Digite la cedula del usuario' type="text" class="form-control" name="filter" value="{{ old('filter') }}" required autofocus>
                  @if ($errors->has('filter'))
                  <span class="help-block">
                  <strong>{{$errors->first('filter')}}</strong>
                  </span>
                  @endif
               </div>
               <div class="form-group">
                  <div class="col-md-4 ">
                     <a href="/"><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"> </span><span>  Buscar</span></button></a>
                  </div>
               </div>
            </form>
         </td>
         <td align="center">
            <div class="col-md-12 ">
               <a href="{{URL::to('newCoa/')}}"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"> </span><span>  Agregar Nuevo Atleta</span></button></a>
            </div>
         </td>
   </div>
   </table>

<div class="col-md-12">
   <div class="table-responsive">
      <table class="table table-hover table-striped text-left">
         <thead>
            <th>Numero de identificacion</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Fecha de nacimiento</th>
            <th>Comunidad</th>
            
            <th></th>
            <th></th>
         </thead>
         @foreach ($person as $p)
         
         <tr>
            <td>{{$p->IDPerson}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->lastName1}}</td>
            <td>{{$p->lastName2}}</td>
            <td>{{$p->birthDate}}</td>
            
             <td>{{$p->nameCommunity}}</td>
              
            <td>
               <a href="{{URL::to('/dispositivo/editar/' . $p->IDPerson)}}">
                  <i class="fa fa-pencil-square-o"></i> <span>Editar</span>
                  <!-- <small class="label pull-right bg-red">PDF</small> -->
               </a>
            </td>
            <td>
               <a href="{{URL::to('/dispositivo/eliminar/' . $p->IDPerson)}}">
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
@endsection