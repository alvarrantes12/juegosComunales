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

<div class="container-fluid">
    <div class="container">
        <div class="col-md-7 col-md-offset-2 text-center">
            <h1>¡Bienvenid@!</h1>
            <h2>Sistema de Inscripción a los Juegos Comunales Grecia</h2>
        </div>
    </div>
</div>


<div class="container">
  <div class="col-md-2 col-md-offset-3 img-responsive">
    <img src=""></img>
  </div>
</div>

</br>


   <div class="col-md-4 col-md-offset-4 text-center">
       <a href="{{URL::to('newCo/')}}">
           <button type="button" class="btn btn-success btn-lg">Inscribir</button>
       </a>
       <a href="{{URL::to('/')}}">
           <button type="button" class="btn btn-success btn-lg">Reportes</button>
       </a>
    </div>


@endsection