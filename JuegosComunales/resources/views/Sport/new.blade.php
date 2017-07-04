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
                   
  <form class="form-horizontal" role="form" method="POST" action="{{ url('insertNewSport/') }}">
    <div class="form-group">
      {!!csrf_field() !!}
      <label for="" class="col-lg-4 control-label">Nombre del deporte:</label>
      <div class="col-lg-6">
        <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" type="text" class="form-control" id="sportName" name = "sportName"
             placeholder="Ej. Ciclismo" value="{{ old('sportName') }}" required autofocus>
      </div>
      <label for="" class="col-lg-4 control-label">Tipo de Deporte:</label>
      <div class = "col-lg-6">
        <select class="form-control" id = "sportT" name = "sportT" required autofocus>
            <option value="0" selected>Seleccione un tipo de deporte...</option>
             @foreach ($sportType as $sportType)
              <option  value ='{{$sportType->IDSportType}}'>{{$sportType->sportType}}</option>
            @endforeach
        </select>
    </div>
    <div></div>
    <label for="" class="col-lg-4 control-label">Cantidad de Atletas:</label>
      <div class="col-lg-6">
        <input type="number" name = "athleteAmount" class="form-control" min="1" required autofocus>
             
    </div>
</div>
<div class="col-lg-offset-8 col-lg-4">
       <a href="{{URL::to('sport/')}}"><button type="button" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button></a>
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