@extends('masterPage')

@section('content')
<section>
      <div class="row">
  <div class="col-md-10 col-md-offset-1 text-right">
      @if (Session::has('fileErrorDel'))
             <div align = "center">
             <div class="alert alert-error">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('fileErrorDel')}}</div></div>
            @endif
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Inscripción en Conjunto</h4>
               </div>
               <div class="panel-body">
  
   <form method="POST" action="{{url ('saveExcel/')}}" accept-charset="UTF-8" enctype="multipart/form-data">
            
           {{ csrf_field() }}
            
            <div class="form-group">
               <label for="" class="col-lg-4 control-label">Edición Vigente</label>
                <div class="col-lg-6">
                             <input type="text" readonly class="form-control" name="Edition" id="Edition" value = "{{$edition->nameEdition}}, {{$edition->year}}">
                    <input type="text"  style = "display: none;" class="form-control"  id="IDEdition" name = "IDEdition"
                         value= "{{$edition->IDEdition}}">
        
                     </div>
                     
               <label for="" class="col-lg-4 control-label">Seleccione un deporte</label>
                <div class="col-lg-6 sport">
                   <select  class="form-control" id = "sport" name = "sport" required >
                    <option value="" selected>Seleccione un tipo de deporte...</option>
                        @foreach ($sport as $s)
                            <option  value ='{{$s->IDSport}}'>{{$s->nameSport}}</option>
                        @endforeach
                   </select>
                </div>
                <label for="" class="col-lg-4 control-label">Seleccione una categoría</label> 
                
                <div class="col-lg-6 category">
                    <select class="form-control" id = "category" name = "category" required autofocus>
                        <option value="" selected>Debe seleccionar un deporte primero....</option>
                </select>
                </div>
                <label id= "label" name= "label" for="" class="col-md-4 control-label" style="display:none;">Prueba</label> 
                 <div class="col-md-6 category">
                    <select class="form-control" id = "test" name = "test" style="display:none;">
                    </select>
                </div>
              <div class="col-md-12"></div>
                
                  <label class="col-md-4 control-label">Nuevo Archivo</label> 
              <div class="col-md-6">
                    
                  
                 <input type="file"name="file" required autofocus>
              <br>
             
              </div>
               
              
             <br>
             <br>
              <div class="col-md-6 col-md-offset-4">
                 <a href="{{URL::to('adminMasterPageSlider/')}}"><button type="button" class="btn btn-primary">Cancelar</button></a>
                <button id= "accept" type="submit" class="btn btn-primary">Aceptar</button>
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
 
 