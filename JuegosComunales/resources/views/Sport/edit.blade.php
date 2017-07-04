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
                  <h4 style="color: #899B82;">Nuevo Deporte</h4>
               </div>
               <div class="panel-body">
                   
  <form class="form-horizontal" role="form" method="POST" action="{{ url('editSport/') }}">
    <div class="form-group">
      {!!csrf_field() !!}
      <label for="" class="col-md-4 control-label">Nombre del deporte:</label>
      <div class="col-md-6">
        <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" type="text" class="form-control" id="nameSport" name = "nameSport"
             value="{{$eSport->nameSport}}" required autofocus>
      </div>
       <div></div>
        <label for="" class="col-md-4 control-label">Tipo de deporte:</label>
       <div class = "col-md-6">
        <select class="form-control" id = "sportT" name = "sportT" required autofocus>
            <option value="{{$eSport->IDSportType}}" selected>{{$eSport->sportType}}</option>
             @foreach ($sportType as $sportType)
             @if ($eSport->IDSportType == $sportType->IDSportType)
             @else
             <option  value ='{{$sportType->IDSportType}}'>{{$sportType->sportType}}</option>
             @endif
            @endforeach
        </select>
    </div>
   <div></div>
    <label for="" class="col-md-4 control-label">Cantidad de Atletas:</label>
      <div class="col-md-6">
        <input type="number" value = '{{$eSport->athletesAmount}}' name = "athleteAmount" class="form-control" min="1" required autofocus>
             
    </div>
    <label for="" class="col-md-4 control-label">Estado:</label>
      <div class = "col-md-6">
        <select class="form-control" id = "active" name = "active"required autofocus>
            @if ($eSport->active == 1)
                <option value="1" selected>Activo</option>
                <option  value ='0'>Inactivo</option>
            @else
                <option value="0" selected>Inactivo</option>
                <option  value ='1'>Activo</option>
            @endif
        </select>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" id="IDSport" name = "IDSport"
              value= "{{$eSport->IDSport}}" style = "display : none;">
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