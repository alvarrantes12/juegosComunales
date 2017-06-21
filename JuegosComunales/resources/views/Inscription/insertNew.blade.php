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
@extends('masterPage')
@section('content')
<div class="form-group">
   <div class="container-fluid">
      <div class="container">
         <div class="col-md-7 col-md-offset-2 text-center">
            <h4 style="color: #899B82;">Nuevo participante</h4>
         </div>
      </div>
   </div>
   <section>
         <div class="col-md-7 col-md-offset-2 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h3 class="panel-title">1) Datos personales</h3>
               </div>
               <div class="panel-body">
                  <form class="form-horizontal" role="form">
                  <div  >
                     <label for="" class="col-lg-4 control-label">Nombre</label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" id="name"
                           placeholder="">
                     </div>
                  </div>
                  <div  >
                     <label for="" class="col-lg-4 control-label">Primer Apellido</label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" id="apellido1" 
                           placeholder="">
                     </div>
                  </div>
                  <div  >
                     <label for="" class="col-lg-4 control-label">Segundo Apellido</label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" id="apellido2"
                           placeholder="">
                     </div>
                  </div>
                  <div  >
                     <label for="" class="col-lg-4 control-label">Fecha de nacimiento</label>
                     <div class="col-lg-6">
                        <div class='input-group date' id='startDate'>
                           <input placeholder = "Seleccione una fecha" name = "startDate" type='text' class="form-control" id='datepicker' autocomplete='off' onchange="changeEventHandler(event);"/>
                           <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div  >
                     <label for="" class="col-lg-4 control-label">Correo electronico</label>
                     <div class="col-lg-6">
                        <input type="email" class="form-control" id="email"
                           placeholder="cccccc@xxxxxx.vvv">
                     </div>
                  </div>
                  <div  >
                     <label for="" class="col-lg-4 control-label">Direccion</label>
                     <div class="col-lg-6">
                        <textarea class="form-control" rows="5" id="addres"></textarea>
                     </div>
                  </div>
                  <br>
                  <br>
                  <br>
                  <div  >
                     <div class="col-lg-offset-2 col-lg-10">
                        <a href="{{URL::to('newDoc/')}}"> 
                        <button class="btn btn-info"><span class="glyphicon"> </span><span>Continuar  &rarr;</span></button>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </section>
   
   <script type="text/javascript">
      $(document).ready(function($)  {
          	$(function () {
                  $('#datepicker').datetimepicker({locale: 'es', format: 'YYYY-MM-DD'});
                  $('#datepicker2').datetimepicker({locale: 'es', format: 'YYYY-MM-DD'});
              });
      	});
      	
   </script>
</div>
@endsection