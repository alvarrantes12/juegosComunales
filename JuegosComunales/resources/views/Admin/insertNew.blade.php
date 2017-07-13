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

   <section>
      <div class="row">
        
         <div class="col-md-7 col-md-offset-2 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                 <h4 style="color: #899B82;">Nuevo participante</h4>
               </div>
               <div class="panel-body">
                  
                   <form class="form-horizontal" role="form" method='POST' id="newP" name="newP" action="{{ url('insertA/') }}">
                 {{ csrf_field() }} 
                  <label for="" class="col-lg-4 control-label text-center">Edición</label>
                        <div class="col-lg-6">
                             <input type="text" readonly class="form-control" name="Edition" id="Edition" value = "{{$edition->nameEdition}}, {{$edition->year}}">
                    <input type="text"  style = "display: none;" class="form-control"  id="IDEdition" name = "IDEdition"
                         value= "{{$edition->IDEdition}}">
        
                     </div>
                     <div>
                   <label for="" class="col-lg-4 control-label">Tipo de participante</label>
                   <div class="btn-group col-lg-6">
                   <select class="form-control" id="role" name="role" required autofocus>
                   <option value="" selected>Seleccione un tipo de participante...</option>
                   @foreach ($role as $r)
                   <option value ='{{$r->IDRole}}'>{{$r->role}}</option>
                   @endforeach
                   </select>
                   </div>
                  </div>
                     <div  >
                        
                     <label for="" class="col-lg-4 control-label">Número de identificación</label>
                     <div class="col-lg-6">
                        <input type="text"  class="form-control" name="IDPerson" id="IDPerson" placeholder="Ej. 201230123" pattern="^[\s\S]{0,191}$" required autofocus>
                     </div>
                  </div>
              
                  <div>
                     <label for="" class="col-lg-4 control-label">Nombre</label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Ej. Juan" pattern="^[\s\S]{0,25}$" title="Maximo 25 letras"  required autofocus>
                     </div>
                  </div>
                  <div>
                     <label for="" class="col-lg-4 control-label">Primer Apellido</label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control"  name="lastName1" id="lastName1" placeholder="Ej. Pérez" pattern="^[\s\S]{0,12}$" title="Maximo 12 letras" required autofocus>
                     </div>
                  </div>
                  <div>
                     <label for="" class="col-lg-4 control-label">Segundo Apellido</label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" name="lastName2" id="lastName2" placeholder="Ej. Pérez" pattern="^[\s\S]{0,12}$" title="Maximo 12 letras" required autofocus>
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
                     <label for="" id="label1" name="label1" style="display:none" class="col-lg-4 control-label">Correo electrónico</label>
                     <div class="col-lg-6">
                        <input type="email" class="form-control" name="email" style="display:none" id="email"
                           placeholder="xxx@yyy.zzz" >
                     </div>
                  </div>
                  
                   <div  >
                     <label for="" id="label2" name="label2" style="display:none"class="col-lg-4 control-label">Número Telefónico</label>
                     <div class="col-lg-6">
                        <input type="text"  class="form-control" name="telephone" style="display:none" id="telephone" pattern="^[0-9]{1}[\-][0-9]{3}[\-][0-9]{2}[\-][0-9]{2}" title="Formato incorrecto, Solo 8 digitos son permitidos y con el formato 2-345-67-89" placeholder="2-494-01-02">
                     </div>
                  </div>
                  
                  
                  <div>
                   <label for="" class="col-lg-4 control-label">Distrito</label>
                   <div class="btn-group col-lg-6">
                   <select  class="form-control" id="district" name="district" required autofocus>
                   <option value="0" selected>Seleccione un distrito...</option>
                   @foreach ($district as $p)
                   @if($p->active == 1)
                   <option value ='{{$p->IDDistrict}}'>{{$p->nameDistrict}}</option>
                   @endif
                   @endforeach
                   </select>
                   </div>
                  </div>
                  
                  
                  <div>
                   <label for="" class="col-lg-4 control-label">Comunidad</label>
                   <div class="btn-group col-lg-6">
                   <select class="form-control" id="community" name="community" required autofocus>
                   <option value="0" selected>Debe seleccionar un distrito primero...</option>
                   </select>
                   </div>
                  </div>
                  
                   <div  >
                     <label for="" class="col-lg-4 control-label">Dirección</label>
                     <div class="col-lg-6">
                        <textarea type="text" style="resize: none;" class="form-control" rows="5" id="address" name = "address"></textarea>
                     </div>
                  </div>
                 
                  <div>
                     
                     <div class="col-lg-offset-2 col-lg-10">
                        <br>
                        <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Continuar  &rarr;</span></button>
                        
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <script type="text/javascript">
      $(document).ready(function($)  {
          	$(function () {
                  $('#birthDate').datetimepicker({locale: 'es', format: 'YYYY-MM-DD', viewMode: 'years'});
                 
              });
      	});
      
   </script>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    
    $("#district").change(function() {
        	$("#community ").empty();
	$.getJSON(('getCommunity/')+$("#district").val(),function(data){
	     $("#community").append('<option value="0">Seleccione una comunidad</option>');
	    $.each(data, function(id,item){
	        	if(item.active == 1){
		    $("#community").append('<option value="'+item.IDCommunity+'">'+item.nameCommunity+'</option>');
        }
	    });
	});
	
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    
        $("#role").change(function() {
        $("#email").hide();
        $("#telephone").hide();
        $("#label1").hide();
        $("#label2").hide();
        	var rol = document.getElementById("role").value;
        	
        	if(rol >= 3){
        	    $("#email").show();
            	$("#telephone").show();
            	$("#label1").show();
            	$("#label2").show();
            	$("#email").required();
            	$("#telephone").required();
        	}
       }) 
    });
</script>

