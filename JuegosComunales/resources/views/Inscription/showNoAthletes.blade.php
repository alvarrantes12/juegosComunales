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
@extends('masterPage')
@section('content')
<section>
      <div class="row">
<div class="col-md-12 col-md-offset-0 text-center">
    @if (Session::has('admin'))
             <div align = "center">
             <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('admin')}}</div></div>
            @endif
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Personal De Apoyo Registrado</h4>
               </div>
               <div class="panel-body">
                  
<div class="col-md-12">
   <div class="table-responsive">
      <table  class="table table-hover table-striped">
         <td aling="center">
            <form class="form-horizontal" role="form" method="POST" action="{{url('searchExtraDel/')}}">
               {{ csrf_field() }}
               <div class="col-md-9">
                  <input id="filter" placeholder='Digite la cedula, el nombre, apellido o cargo' type="text" class="form-control" name="filter" value="{{ old('filter') }}" required autofocus>
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
               <a href="{{URL::to('insertNewPart/')}}"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"> </span><span>  Agregar Nuevo Participante</span></button></a>
            </div>
         </td>
   </div>
   </table>

<div class="col-md-12">
   <div class="table-responsive text-center">
      <table class="table table-hover table-striped text-center">
         <thead>
            <th>Número de identificación</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Fecha de nacimiento</th>
            <th>Correo electrónico</th>
            
            <th>Comunidad</th>
            <th>Cargo</th>
           
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
            
            <td>{{$p->email}}</td>
             
             <td>{{$p->nameCommunity}}</td>
              <td>{{$p->role}}</td>
              
               
        <td>
               <a href="{{URL::to('editExtraDel/' . $p->IDPerson)}}">
                  <i class="fa fa-pencil-square-o"></i> <span>Editar</span>
                 
             </a>
            </td>
            <td>
                   <a href="{{URL::to('deleteExtraDel/'.$p->IDPerson)}}">
                       <i class="fa fa-trash-o"></i><span> Eliminar</span>
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