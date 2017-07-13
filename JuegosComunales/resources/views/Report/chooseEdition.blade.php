 <!--Universidad de Costa Rica
Informática Empresarial

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
<section>
      <div class="row">
<div class="col-md-10 col-md-offset-1 text-center">
          <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Reporte de atletas por edición</h4>
               </div>
               <div class="panel-body">
  

    <form class="form-horizontal" role="form" method="POST" target="_blank" action="{{ url('generateEditionPDF/') }}">
      
        <div class="form-group">
            {!!csrf_field() !!}
            <label for="" class="col-lg-4 control-label">Seleccione la edición</label>
            <div class="col-lg-6">
                 <select  class="form-control" id = "edition" name = "edition" required autofocus>
                    <option value="" selected>Seleccione una edición</option>
                        @foreach ($edition as $e)
                            <option  value ='{{$e->IDEdition}}'>{{$e->nameEdition}}</option>
                        @endforeach
                   </select>
            </div>
                     
        </div>
        
            <div class="col-lg-offset-8 col-lg-4">
             <br>
               <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Exportar PDF</span></button>
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
    
    $("#district").change(function() {
        	$("#community ").empty();
	$.getJSON(('getCommunity/')+$("#district").val(),function(data){
	     $("#community").append('<option value="">Seleccione una comunidad</option>');
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
	     $("#category").append('<option value="">Seleccione una categoría</option>');
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
	     $("#category").append('<option value="">Seleccione una categoría</option>');
	    $.each(data, function(id,item){
		    $("#category").append('<option value="'+item.IDCategory+'">'+item.nameCategory+'</option>');
	    });
	});
	
    });
});
</script>