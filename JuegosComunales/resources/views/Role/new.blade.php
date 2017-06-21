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

Clase: userType
Vista que se encarga de crear un formulario con el fin deagregar tipos de usuarios-->

@extends('adminMasterPage')

@section('adminContent')



<div class="col-md-10 col-md-offset-1 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Nuevo Tipo de Usuario</h4>
               </div>
               <div class="panel-body">

    <form class="form-horizontal" role="form" method="POST" action="{{ url('insertR/') }}">
      
 <div class="form-group">
    {!!csrf_field() !!}
    <label for="" class="col-lg-4 control-label">Nombre del tipo de usuario:</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" id="role" name = "role"
             placeholder="Digite el nombre el tipo de usuario" value="{{ old('role') }}">
    </div>

    
</div>
<div class="col-lg-offset-8 col-lg-4">
      <a href="{{URL::to('showRol/')}}"><button type="btn btn-info" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button></a>
      <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Aceptar</span></button>
    </div>
</form>
</div>
</div>
</div>


@endsection