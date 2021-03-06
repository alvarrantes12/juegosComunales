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

<div class="col-md-10 col-md-offset-1 text-center">
    <div class="panel panel-success">
               <div class="panel-heading">
            <h4 style="color: #899B82;">Editar Prueba</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('editTest/') }}">
            <div class="form-group">
            {!!csrf_field() !!}
                <label for="" class="col-lg-4 control-label">Deporte al que pertenece</label>
                <div class="col-lg-6 sport">
                   <select class="form-control" id = "sport" name = "sport" >
                    <option value="$test->IDSport" selected>{{$test->nameSport}}</option>
                        @foreach ($sport as $s)
                            <option  value ='{{$s->IDSport}}'>{{$s->nameSport}}</option>
                        @endforeach
                   </select>
                </div>
                <label for="" class="col-lg-4 control-label">Categoría a la que pertenece</label> 
                <div class="col-lg-6 category">
                    <select class="form-control" id = "category" name = "category" >
                        <option value = '{{$test->IDCategory}}' selected>{{$test->nameCategory}}</option>
                          
                    </select>
                </div>
                <label for="" class="col-lg-4 control-label">Nombre de la prueba</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="IDTest" name = "IDTest" value="{{$test->IDTest}}" style="display:none">
               
                  <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" type="text" class="form-control" id="testName" name = "testName" placeholder="Ej. 100 metros planos" value="{{$test->nameTest}}" required autofocus>
                </div>
         

            <div class="col-lg-offset-8 col-lg-4">
              <br>
              <a href="{{URL::to('test/')}}"><button type="button" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button></a>
              <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Aceptar</span></button>
            </div>
            </div>
            </form>
            
        </div>
  </div>
</div>
</div>
</section>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    
    $("#sport").change(function() {
        	$("#category ").empty();
	$.getJSON(('getCategory/')+$("#sport").val(),function(data){
	    $("#category").append('<option value="0">Seleccione una categoría</option>');
	    $.each(data, function(id,item){
		    $("#category").append('<option value="'+item.IDCategory+'">'+item.nameCategory+'</option>');
	    });
	});
	
    });
});
</script>





