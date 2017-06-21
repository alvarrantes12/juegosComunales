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
@extends('masterPage')

@section('content')

<div class="form-group">
<div class="container-fluid">
    <div class="container">
        <div class="col-md-7 col-md-offset-2 text-center">
            <h2>Nuevo participante</h2>
        </div>
    </div>
</div>

<section>
<div class="row">
  <div class="col-md-6">
      <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">2) Aspectos físicos</h3>
  </div>
  <div class="panel-body">
      
  <form class="form-horizontal" role="form" method='POST' id="newPS" name="newPS" action="{{ url('insertDoc/') }}">
  {{ csrf_field() }} 
                 
 <div  >
    <label for="" class="col-lg-4 control-label">Altura</label>
    <div class="col-lg-6">
     <input type="number" id="height" name="height" class="form-control" min="80" required autofocus>
    </div>
    <span class="input-group-addon col-lg-14">cm</span>
 </div>

<div  >
    <label for="" class="col-lg-4 control-label">Peso</label>
    <div class="col-lg-6">

  <input type="number" id="weight" name="weight" class="form-control" min="20" required autofocus>
      
    </div>
     <span class="input-group-addon col-lg-14">kg</span>
 </div>


<div>
                   <label for="" class="col-lg-4 control-label">Tipo de sangre</label>
                   <div class="btn-group col-lg-6">
                   <select class="form-control" id="bloodType" name="bloodType" required autofocus>
                   <option value="" selected>Seleccione un tipo de sangre...</option>
                   @foreach ($bloodType as $b)
                   <option value ='{{$b->IDBloodType}}'>{{$b->bloodType}}</option>
                   @endforeach
                   </select>
                   </div>
</div>


  </div>
</div>
</div>


<div class="col-md-6">
      <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">3) Datos deportivos</h3>
  </div>
  <div class="panel-body">
 
<div  >
    <label for="" class="col-lg-4 control-label">Deporte</label>
    <div class="col-lg-6">
      <select class="form-control">
  <option>Ciclismo</option>
  <option>Atletismo</option>
  <option>Natacion</option>
      </select>
    </div>
 </div>
 
 
<div  >
    <label for="" class="col-lg-4 control-label">Prueba</label>
    <div class="col-lg-6">
      <select class="form-control">
  <option>Velocidad</option>
  <option>Salto de vallas</option>
  <option>Relevos</option>
      </select>
    </div>
 </div>


<div>
    <label for="" class="col-lg-4 control-label">Categoria</label>
    <div class="btn-group col-lg-6">
    <select class="form-control" id="category" name="category" required autofocus>
    <option value="" selected>Seleccione una categoria...</option>
    @foreach ($category as $c)
    <option value ='{{$c->IDCategory}}'>{{$c->nameCategory}}</option>
     @endforeach
    </select>
    </div>
</div>
  </div>
</div>
</section>









<section>
    <div class="col-md-14">
         <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">4) Documentos de inscripcion</h3>
  </div>
  <div class="panel-body">
    
    <section class="col-md-12">
    <div class="col-md-3">
        <label for="adj">Fotografia (imagen)</label>
        </div>
        
    <div class="col-md-4">
    <input type="file" id="archivo1">
        </div>
    </section>
    
    <section class="col-md-12">
    <div class="col-md-3">
        <label for="adj">Foto cedula frente (imagen)</label>
        </div>
        
    <div class="col-md-4">
    <input type="file" id="archivo2">
        </div>
    </section>
    
    <section class="col-md-12">
    <div class="col-md-3">
        <label for="adj">Foto cedula atras (imagen)</label>
        </div>
        
    <div class="col-md-4">
    <input type="file" id="archivo3">
        </div>
    </section>
     
     <section class="col-md-12">
    <div class="col-md-3">
        <label for="adj">Boleta de inscripcion (pdf)</label>
        </div>
        
    <div class="col-md-4">
    <input type="file" id="archivo4">
        </div>
    </section>
    
  </div>
</div>
    </div>
</section>

<div class="container-fluid">
    <div class="container">
        <div class="col-md-7 col-md-offset-2 text-center">
           <button type="submit" class="btn btn-primary"><span class="glyphicon"> </span><span>Finalizar inscripcion</span></button>
        </div>
    </div>
</div>
</form>
</div>
@endsection