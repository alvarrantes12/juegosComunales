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



<div class="col-md-10 col-md-offset-1 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Editar Administrador</h4>
               </div>
               <div class="panel-body">


 <form class="form-horizontal" role="form" method="POST" action="{{ url('editAdminS/') }}">
      
 <div class="form-group">
    {!!csrf_field() !!}
    
    
    
    <input type="text" class="form-control" id="IDPerson" name = "IDPerson"
   value= "{{$eAdmin->IDPerson}}" style = "display:none;">
<label for="" class="col-lg-4 control-label">Numero de identidad</label>
<div class="col-lg-6">
   <input readonly type="text" class="form-control" id="IDPerson" name = "IDPerson" 
      value= "{{$eAdmin->IDPerson}}">
</div>
    
    
    <input type="text" class="form-control" id="name" name = "name"
   value= "{{$eAdmin->name}}" style = "display:none;">
<label for="" class="col-lg-4 control-label">Nombre</label>
<div class="col-lg-6">
   <input type="text" class="form-control" id="name" name = "name" pattern="^[\s\S]{0,25}$" title="Maximo 25 letras"
      value= "{{$eAdmin->name}}" required autofocus>
</div>
    
    <input type="text" class="form-control" id="lastName1" name = "lastName1"
   value= "{{$eAdmin->lastName1}}" style = "display:none;">
<label for="" class="col-lg-4 control-label">Primer apellido</label>
<div class="col-lg-6">
   <input type="text" class="form-control" id="lastName1" name = "lastName1" pattern="^[\s\S]{0,12}$" title="Maximo 12 letras"
      value= "{{$eAdmin->lastName1}}" required autofocus>
</div>
    
<input type="text" class="form-control" id="lastName2" name = "lastName2"
   value= "{{$eAdmin->lastName2}}" style = "display:none;">
<label for="" class="col-lg-4 control-label">Segundo apellido</label>
<div class="col-lg-6">
   <input type="text" class="form-control" id="lastName2" name = "lastName2" pattern="^[\s\S]{0,12}$" title="Maximo 12 letras"
      value= "{{$eAdmin->lastName2}}" required autofocus>
</div>
    
 <label for="" class="col-lg-4 control-label">Fecha de nacimiento</label>
    <div class="col-lg-6">
        <div class='input-group date' id='birthDate'>
            <input value= "{{$eAdmin->birthDate}}" name = "birthDate" type='text' class="form-control" id='datepicker' pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" title="La fecha debe ser año-mes-dia"  autocomplete='off' onchange="changeEventHandler(event);" required autofocus/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
        </div>
        </div>
        
  <input type="text" class="form-control" id="telephone" name = "telephone"
   value= "{{$eAdmin->telephone}}" style = "display:none;">
<label for="" class="col-lg-4 control-label">Telefono</label>
<div class="col-lg-6">
   <input type="text" class="form-control" id="telephone" name = "telephone" pattern="^[0-9]{1}[\-][0-9]{3}[\-][0-9]{2}[\-][0-9]{2}"  title="Formato incorrecto, Solo 8 digitos son permitidos y con el formato 2-345-67-89" placeholder="2-494-01-02"
      value= "{{$eAdmin->telephone}}">
</div>      
        
     <input type="text" class="form-control" id="email" name = "email"
   value= "{{$eAdmin->email}}" style = "display:none;">
<label for="" class="col-lg-4 control-label">Correo electronico</label>
<div class="col-lg-6">
   <input type="email" class="form-control" id="email" name = "email"
      value= "{{$eAdmin->email}}">
</div>    
        

</div>
<div class="col-lg-offset-8 col-lg-4">
      <a href="{{URL::to('showA/')}}"><button type="button" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button></a>
      <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Aceptar</span></button>
    </div>
</form>
</div>
</div>
</div>

             


 <script type="text/javascript">
      $(document).ready(function($)  {
          	$(function () {
                  $('#birthDate').datetimepicker({locale: 'es', format: 'YYYY-MM-DD'});
                  $('#birthDate2').datetimepicker({locale: 'es', format: 'YYYY-MM-DD'});
              });
      	});
      
   </script>
@endsection