 <!--Universidad de Costa Rica
Informática Empresarial
IF7102 - Multimedios
Prof. Jonathan Rojas
Proyecto Inscripciones Juegos comunales Comité de deportes de Grecia
Estudiantes:
Paula Álvarez Barrantes – B40301
Elí Hidalgo Quesada - B43429
Stephanie Rojas Alfaro – A54827
I Ciclo, 2017

Clase: specification
Vista que se encarga de crear un formulario con el fin crear un nuevo canton en la base de datos-->
@extends('adminMasterPage')

@section('adminContent')

<div class="col-md-10 col-md-offset-1 text-center">
            <div class="panel panel-info">
               <div class="panel-heading">
                 <h4 style="color: #899B82;">Reportes</h4>
               </div>
               <div class="panel-body">

    <form class="form-horizontal" role="form" method="POST" action="{{ url('generatePDF/') }}">
      
        <div class="form-group">
            {!!csrf_field() !!}
            <label for="" class="col-lg-4 control-label">Seleccione el distrito</label>
            <div class="col-lg-6">
                 <select  class="form-control" id = "district" name = "district" required autofocus>
                    <option value="0" selected>Seleccione un distrito</option>
                        @foreach ($district as $d)
                            <option  value ='{{$d->IDDistrict}}'>{{$d->nameDistrict}}</option>
                        @endforeach
                   </select>
            </div>
                     <label for="" class="col-lg-4 control-label">Seleccione la comunidad:</label> 
                <div class="col-lg-6 category">
                    <select class="form-control" id = "community" name = "community" required autofocus>
                        <option value="0" selected>Debe seleccionar un distrito primero</option>
                    </select>
                </div>
                
                 <label for="" class="col-lg-4 control-label">Seleccione el deporte</label>
            <div class="col-lg-6">
                 <select  class="form-control" id = "sport" name = "sport" required autofocus>
                    <option value="0" selected>Seleccione un deporte</option>
                        @foreach ($sport as $s)
                            <option  value ='{{$s->IDSport}}'>{{$s->nameSport}}</option>
                        @endforeach
                   </select>
            </div>
                     <label for="" class="col-lg-4 control-label">Seleccione la categoria:</label> 
                <div class="col-lg-6 category">
                    <select class="form-control" id = "category" name = "category" required autofocus>
                        <option value="0" selected>Debe seleccionar un deporte primero</option>
                    </select>
                </div>
                
        </div>
        
            <div class="col-lg-offset-8 col-lg-4">
              <button type="button" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button>
               <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Exportar PDF</span></button>
            </div>
      
        </form>
  </div>
  </div>
  </div>


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    
    $("#district").change(function() {
        	$("#community ").empty();
	$.getJSON(('getCommunity/')+$("#district").val(),function(data){
	     $("#community").append('<option value="0">Seleccione una comunidad</option>');
	    $.each(data, function(id,item){
		    $("#community").append('<option value="'+item.IDCommunity+'">'+item.nameCommunity+'</option>');
	    });
	});
	
    });
});
</script>

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


<script type="text/javascript">
$(document).ready(function() {
    
    $("#type").change(function() {
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