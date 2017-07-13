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

<div class="form-group">
<div class="container-fluid">
    <div class="container">
        @if (Session::has('delegate'))
             <div align = "center">
             <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('delegate')}}</div></div>
            @endif
        <div class="col-md-7 col-md-offset-2 text-center">
            <h2>Nuevo participante</h2>
        </div>
    </div>
</div>

<section>
<div class="row">
  <div class="col-md-6">
      <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">2) Aspectos físicos</h3>
  </div>
  <div class="panel-body">
      
  <form class="form-horizontal" role="form" method='POST' id="newPS" name="newPS" action="{{ url('insertDoc/') }}"  enctype="multipart/form-data">
  {{ csrf_field() }} 
                 
 <div  >
    <label for="" class="col-lg-4 control-label">Altura</label>
    <div class="col-lg-6">
        
     <input type="number" id="height" name="height" class="form-control" min="80" required autofocus>
     <input type="text" id="year" name="year" class="form-control" style="display:none" value='{{$year}}' required autofocus>
    </div>
    <span class="col-lg-14">cm</span>
 </div>

<div  >
    <label for="" class="col-lg-4 control-label">Peso</label>
    <div class="col-lg-6">

  <input type="number" id="weight" name="weight" class="form-control" min="20" required autofocus>
      
    </div>
    <br>
     <span class="col-lg-14">kg</span>
 </div>


<div>
                   <label for="" class="col-lg-4 control-label">Tipo de sangre</label>
                   <div class="btn-group col-lg-6">
                   <select class="form-control" id="bloodType" name="bloodType" required autofocus>
                   <option value="" selected>Seleccione un tipo de sangre...</option>
                   @foreach ($bloodType as $b)
                   <option value ='{{$b->IDBloodType}}'>{{$b->bloodType}}</option>
                   @endforeach
                   </select>
                   </div>
</div>


  </div>
</div>
</div>


<div class="col-md-6">
      <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">3) Datos deportivos</h3>
  </div>
  <div class="panel-body">
 
<div  >
    <label for="" class="col-lg-4 control-label">Deporte</label>
    <div class="col-lg-6">
      <select  class="form-control" id = "sport" name = "sport" required autofocus>
                    <option value="" selected>Seleccione un tipo de deporte...</option>
                        @foreach ($sport as $s)
                        @if($s->active == 1)
                            <option  value ='{{$s->IDSport}}'>{{$s->nameSport}}</option>
                            @endif
                        @endforeach
                   </select>
                </div>
                <label for="" class="col-lg-4 control-label">Categoría</label> 
                <div class="col-lg-6 category">
                    <select class="form-control" id = "category" name = "category" required autofocus>
                        <option value="" selected>Debe seleccionar un deporte primero</option>
                    </select>
                </div>
                <label id= "label" name= "label" for="" class="col-lg-4 control-label" style="display:none">Prueba</label> 
                <div class="col-lg-6 category">
                    <select class="form-control" id = "test" name = "test" style="display:none">
                    </select>
                </div>
    </div>
 </div>


  </div>
</div>
</section>



<section>
    <div class="col-md-14">
         <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">4) Documentos de inscripción</h3>
  </div>
  <div class="panel-body">
    
    
    
    
    <section class="col-md-12">
    <div class="col-md-3">
        <label for="adj">Fotografía (imagen)</label>
        </div>
        
    <div class="col-md-4">
    <input type="file" id="f1" name="f1">
        </div>
    </section>
    
    
    <section class="col-md-12">
    <div class="col-md-3">
        <label for="adj">Foto cédula frente (imagen)</label>
        </div>
        
    <div class="col-md-4">
    <input type="file" id="f2" name="f2">
        </div>
    </section>
    
    <section class="col-md-12">
    <div class="col-md-3">
        <label for="adj">Foto cédula atras (imagen)</label>
        </div>
        
    <div class="col-md-4">
    <input type="file" id="f3" name="f3">
        </div>
    </section>
     
    
  </div>
</div>
    </div>
</section>

<div class="container-fluid">
    <div class="container">
        <div class="col-md-7 col-md-offset-2 text-center">
           <button type="submit" class="btn btn-primary"><span class="glyphicon"> </span><span>Finalizar inscripción</span></button>
        </div>
    </div>
</div>
</form>
</div>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    
    $("#sport").change(function() {
        	$("#category ").empty();
	$.getJSON(('getCategory/')+$("#sport").val(),function(data){
	     $("#category").append('<option value="">Seleccione una categoría</option>');
	    $.each(data, function(id,item){
	        if(item.active == 1){
		    $("#category").append('<option value="'+item.IDCategory+'">'+item.nameCategory+'</option>');
	    }
	        
	    });
	});
	
    });
});
</script>


<script type="text/javascript">
$(document).ready(function() {
    
    $("#category").change(function() {
        	$("#test").empty();
        	 $("#test").hide();
        	$("#label").hide();
        	
        
	$.getJSON(('getTest/')+$("#category").val(),function(data){
	     $("#test").append('<option value="">Seleccione una prueba</option>');
	    $.each(data, function(id,item){
	        if (data != null) {
            $("#test").show();
        	$("#label").show();
		    $("#test").append('<option value="'+item.IDTest+'">'+item.nameTest+'</option>');
	    
	    }
	    });
	});
	
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    	
$("#category").change(function() {
var person =  document.getElementById("year").value.substring(0,4);
var date = new Date();
var year = date.getFullYear();
var age= year - person;
    
	$.getJSON(('getAge/')+$("#category").val(),function(data){
	 
	     $.each(data, function(id,item){
	 
	     if((item.startAge > age)||(item.endAge < age)){
	          $("#category").empty();
	         $("#category").append('<option value="">El atleta no cumple con los requisitos de esta categoria</option>');
	        $("#category").require();

	    
	     }
	     });
	        
	    });
	});
	
});
</script>


