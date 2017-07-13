@extends('masterPage')

@section('content')

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
   
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner ">
     <div class="item active">
     <img src="/dist/img/motion-1500x1000.jpg" alt="Bienvenid@">
      <div class="carousel-caption">
        <h3>Bienvenid@</h3>
        <p>Sistema de Inscripción para Juegos Comunales</p>
      </div>
    </div>
    
    <div class="item">
        <a  href="{{URL::to('showAthletes/')}}"><img src="/dist/img/soccer-570836_1280.jpg" alt="Inscribir"></a>
      <div class="carousel-caption">
        <h3>Atletas</h3>
        <p>Lista de atletas inscritos</p>
      </div>
    </div>
    
    <div class="item">
        <a  href="{{URL::to('showExtraDel/')}}"><img src="/dist/img/karate.jpg" alt="Personal de Apoyo"></a>
      <div class="carousel-caption">
        <h3>Personal de Apoyo</h3>
        <p>Lista de personal inscrito</p>
      </div>
    </div>

    <div class="item">
      <a  href="{{URL::to('reportDel/')}}"><img src="/dist/img/1300x600_fit_Bike-und-_Mountainbike-im-_Gasteinert.jpg" alt="Reportes"></a>
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
