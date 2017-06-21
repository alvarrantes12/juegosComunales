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

<form class="form-horizontal" role="form" method="POST" action="{{ url('insertNewCategory/') }}">
     
      
  <div class="col-md-10 col-md-offset-1 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                 <h4 style="color: #899B82;">Nueva Categoría</h4>
               </div>
               <div class="panel-body">
                  <form class="form-horizontal" role="form">

    {!!csrf_field() !!}
    <label for="" class="col-lg-4 control-label">Deporte:</label>
      <div class="col-lg-6">
        <select class="form-control" id = "sport" name = "sport" required autofocus>
            <option value="0" selected>Seleccione un Deporte...</option>
             @foreach ($sport as $s)
              <option  value ='{{$s->IDSport}}'>{{$s->nameSport}}</option>
            @endforeach
        </select>
    </div>
    <label for="" class="col-lg-4 control-label">Nombre de la categoría:</label>
    <div class="col-lg-6">
      <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" type="text" class="form-control" id="category" name = "category"
             placeholder="Ej. Sub-17" value="{{ old('category') }}" required autofocus>
    </div>
    
    

    <label for="" class="col-lg-4 control-label">Límite inicial de fecha de nacimiento:</label>
    <div class="col-lg-6">
        <div class='input-group date' id='startDate'>
            <input pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" title="La fecha debe ser año-mes-dia" placeholder = "Seleccione una fecha" name = "startDate" type='text' class="form-control" id='datepicker' autocomplete='off' onchange="changeEventHandler(event);" required autofocus/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
        </div>
        </div>
        
        
        <label for="" class="col-md-4 control-label">Fecha límite de fecha de nacimiento:</label>
    <div class="col-lg-6">
        <div class='input-group date' id='endDate'>
            <input pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" title="La fecha debe ser año-mes-dia" placeholder = "Seleccione una fecha" name = "endDate" type='text' class="form-control" id='datepicker2' autocomplete='off' onchange="changeEventHandler(event);" required autofocus/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
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