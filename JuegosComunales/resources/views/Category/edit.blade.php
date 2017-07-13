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

<form class="form-horizontal" role="form" method="POST" action="{{ url('editCategory/') }}">
      
      
  <div class="col-md-10 col-md-offset-1 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                 <h4 style="color: #899B82;">Editar Categoría</h4>
               </div>
               <div class="panel-body">
                  <form class="form-horizontal" role="form">
 <div class="form-group">
    {!!csrf_field() !!}
      <div class="col-lg-12">
        <div align="right" class="col-lg-4">
    <label for="" class="control-label">Deporte</label>
    </div>
      <div class="col-lg-6">
        <select class="form-control" id = "sport" name = "sport">
            <option  value= "{{$eCategory->IDSport}}" selected>{{$eCategory->nameSport}}</option>
            @foreach ($sport as $s)
            @if ($eCategory->IDSport == $s->IDSport)
            @else
                 @if($s->active == 1)
                <option  value ='{{$s->IDSport}}'>{{$s->nameSport}}</option>
           @endif
            @endif

            @endforeach
        </select>
    </div>
     </div>
      <div class="col-lg-12">
        <div align="right" class="col-lg-4">
    <label for="" class=" control-label">Nombre de la categoría</label>
    </div>
    <div class="col-lg-6">
      <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" type="text" class="form-control" id="nameCategory" name = "nameCategory"
             value= "{{$eCategory->nameCategory}}">
    </div>
     </div>
    
  <div class="col-lg-12">
        <div align="right" class="col-lg-4">
    <label for="" class="control-label">Edad mínima</label>
  </div>
             <div align="left" class="col-lg-6">
                <input type="number" class="form-control" name="startAge" id="startAge" value= "{{$eCategory->startAge}}"pattern="[0-9]{2}" title="Solo se permíten números"  required autofocus>
            </div>
             <div align="left" class="col-lg-2">
                 <label for="" class="control-label">Años</label>
                 </div>
            </div>
        
        <div class="col-lg-12">
        <div align="right" class="col-lg-4">
        <label for="" class="control-label">Edad máxima</label>
        </div>
    <div  padding-left="15px"align="left" class="col-lg-6">
                <input type="number" class="form-control" name="endAge" id="endAge"  value= "{{$eCategory->endAge}}" pattern="[0-9]{2}" title="Solo se permíten números"  required autofocus>
            </div>
            <div align="left" class="col-lg-2">
                <label for="" class="control-label">Años</label>
                </div>
            </div>
         <div class="col-lg-6">
      <input type="text" class="form-control" id="IDCategory" name = "IDCategory"
             value="{{$eCategory->IDCategory}}" style = "display:none;">
    </div>
</div>
<div class="col-lg-offset-8 col-lg-4">
      <a href="{{URL::to('category/')}}"><button type="button" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button></a>
      <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Aceptar</span></button>
    </div>
</form>
 </div>
 </div>
        
      </div>
   </section>
 
 
 
<script type="text/javascript">
    $(document).ready(function($)  {
        	$(function () {
                $('#datepicker').datetimepicker({locale: 'es', format: 'YYYY-MM-DD', viewMode: 'years'});
                $('#datepicker2').datetimepicker({locale: 'es', format: 'YYYY-MM-DD', viewMode: 'years'});
            });
    	});
</script>
@endsection