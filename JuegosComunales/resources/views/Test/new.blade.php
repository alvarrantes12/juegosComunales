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
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 style="color: #899B82;">Nueva Prueba</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('insertNewTest/') }}">
            <div class="form-group">
            {!!csrf_field() !!}
                <label for="" class="col-lg-4 control-label">Deporte al que pertenece:</label>
                <div class="col-lg-6 sport">
                   <select  class="form-control" id = "sport" name = "sport" required autofocus>
                    <option value="0" selected>Seleccione un tipo de deporte...</option>
                        @foreach ($sport as $s)
                            <option  value ='{{$s->IDSport}}'>{{$s->nameSport}}</option>
                        @endforeach
                   </select>
                </div>
                <label for="" class="col-lg-4 control-label">Categoría a la que pertenece:</label> 
                <div class="col-lg-6 category">
                    <select class="form-control" id = "category" name = "category" required autofocus>
                        <option value="0" selected>Debe seleccionar un deporte primero</option>
                    </select>
                </div>
                <label for="" class="col-lg-4 control-label">Nombre de la prueba:</label>
                <div class="col-lg-6">
                  <input type="text" pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres"class="form-control" id="testName" name = "testName" placeholder="Ej. 100 metros planos" value="{{ old('testName')}}" required autofocus>
                </div>
         
            <div class="col-lg-offset-8 col-lg-4">
              <a href="{{URL::to('test/')}}"><button type="button" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button></a>
              <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Aceptar</span></button>
            </div>
            </div>
            </form>
            
        </div>
  </div>
</div>
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

