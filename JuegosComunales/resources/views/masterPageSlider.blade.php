@extends('masterPage')

@section('content')

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
   
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner ">
     <div class="item active">
     <img src="/dist/img/sport-1201014_1280.jpg" alt="Bienvenid@">
      <div class="carousel-caption">
        <h3>Bienvenid@</h3>
        <p>Sistema de Inscripción para Juegos Comunales</p>
      </div>
    </div>
    
    <div class="item">
        <a  href="{{URL::to('newCo/')}}"><img src="/dist/img/sport-1201014_1280.jpg" alt="Inscribir"></a>
      <div class="carousel-caption">
        <h3>Inscribir</h3>
        <p>Inscribir Representantes de las comunidades</p>
      </div>
    </div>

    <div class="item">
      <img src="/dist/img/sport-1201014_1280.jpg" alt="Reportes">
      <div class="carousel-caption">
        <h3>Reportes</h3>
        <p>Generar reportes de los Juegos Comunales</p>
      </div>
    </div>
    
   

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


@endsection
