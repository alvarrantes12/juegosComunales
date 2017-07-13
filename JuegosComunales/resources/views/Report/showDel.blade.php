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
@extends('masterPage')

@section('content')
<section>
      <div class="row">
<div class="col-md-10 col-md-offset-1 text-center">
             <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Reporte de atletas por categoría</h4>
               </div>
               <div class="panel-body">

    <form class="form-horizontal" role="form" method="POST" target="_blank" action="{{ url('reportPDF/') }}">
      
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
                 <label for="" class="col-lg-4 control-label">Seleccione el deporte</label>
            <div class="col-lg-6">
                 <select  class="form-control" id = "sport" name = "sport" required autofocus>
                    <option value="" selected>Seleccione un deporte</option>
                        @foreach ($sport as $s)
                            <option  value ='{{$s->IDSport}}'>{{$s->nameSport}}</option>
                        @endforeach
                   </select>
            </div>
                     <label for="" class="col-lg-4 control-label">Seleccione la categoría</label> 
                <div class="col-lg-6 category">
                    <select class="form-control" id = "category" name = "category" required autofocus>
                        <option value="" selected>Debe seleccionar un deporte primero</option>
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