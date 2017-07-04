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

<form class="form-horizontal" role="form">
     
      
  <div class="col-md-10 col-md-offset-1 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                 <h4 style="color: #899B82;">Nueva Participante</h4>
               </div>
               <div class="panel-body">
                  

    {!!csrf_field() !!}
    <div>
        <label for="" class="col-lg-4 control-label">Numero de identificación</label>
        <div class="col-lg-6">
            <input type="text"  class="form-control" name="IDPerson" id="IDPerson" placeholder="" pattern="^[\s\S]{0,191}$" required autofocus>
        </div>
    </div>
    <div>
        <label for="" class="col-lg-4 control-label">Nombre</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="name" id="name" placeholder="" pattern="^[\s\S]{0,25}$" title="Maximo 25 letras"  required autofocus>
            </div>
            </div>
    <div>
        <label for="" class="col-lg-4 control-label">Primer Apellido</label>
        <div class="col-lg-6">
            <input type="text" class="form-control"  name="lastName1" id="lastName1" placeholder="" pattern="^[\s\S]{0,12}$" title="Maximo 12 letras" required autofocus>
        </div>
    </div>
    <div>
   <label for="" class="col-lg-4 control-label">Segundo Apellido</label>
   <div class="col-lg-6">
      <input type="text" class="form-control" name="lastName2" id="lastName2" placeholder="" pattern="^[\s\S]{0,12}$" title="Maximo 12 letras" required autofocus>
   </div>
</div>
<div>
   <label for="" class="col-lg-4 control-label">Género</label>
   <div class="btn-group col-lg-6">
      <select class="form-control" id="gender" name="gender" required autofocus>
         <option value ="0" selected>Seleccione su género...</option>
         <option value ="F" >Femenino</option>
         <option value ="M" >Masculino</option>
      </select>
   </div>
</div>
<div>
                     <label for="" class="col-lg-4 control-label">Fecha de nacimiento</label>
                     <div class="col-lg-6">
                        <div class='input-group date' id='startDate'>
                           <input placeholder = "Seleccione una fecha" name = "birthDate" type='text' class="form-control" id='birthDate' autocomplete='off' pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" title="La fecha debe ser año-mes-dia" onchange="changeEventHandler(event);" required autofocus/>
                           <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div  >
                     <label for="" class="col-lg-4 control-label">Correo electronico</label>
                     <div class="col-lg-6">
                        <input type="email" class="form-control" name="email" id="email"
                           placeholder="xxx@yyy.zzz"  required autofocus>
                     </div>
                  </div>
                  
                   <div  >
                     <label for="" class="col-lg-4 control-label">Numero Telefonico</label>
                     <div class="col-lg-6">
                        <input type="text"  class="form-control" name="telephone" id="telephone" pattern="^[0-9]{1}[\-][0-9]{3}[\-][0-9]{2}[\-][0-9]{2}" title="Formato incorrecto, Solo 8 digitos son permitidos y con el formato 2-345-67-89" placeholder="2-494-01-02"  required autofocus>
                     </div>
                  </div>
                  
                  
                  
                  
                  
   
        <div class="col-lg-offset-8 col-lg-4">
      <a href="{{URL::to('category/')}}"><button type="button" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button></a>
      <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Aceptar</span></button>
</div>

    
</form>

  </div>
   </section>

@endsection
<script type="text/javascript">
      $(document).ready(function($)  {
          	$(function () {
                  $('#birthDate').datetimepicker({locale: 'es', format: 'YYYY-MM-DD'});
                  $('#birthDate2').datetimepicker({locale: 'es', format: 'YYYY-MM-DD'});
                  
              });
      	});
      
   </script>
  <script type="text/javascript"> 
   $(function() {
  $("#birthDate").datepicker(
    {
      minDate: new Date(1900,1-1,1), maxDate: '-18Y',
      dateFormat: 'dd/mm/yy',
      defaultDate: new Date(1970,1-1,1),
      changeMonth: true,
      changeYear: true,
      yearRange: '-110:-18'
    }
  );
});
  </script>
