@extends('adminMasterPage')

@section('adminContent')

@if (Session::has('perfil'))
             <div align = "center">
             <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('perfil')}}</div></div>
            @endif
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
    <li data-target="#myCarousel" data-slide-to="7"></li>
    <li data-target="#myCarousel" data-slide-to="8"></li>
    
    
   
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
        <a  href="{{URL::to('showP/')}}"><img src="/dist/img/karate.jpg" alt="Inscribir"></a>
      <div class="carousel-caption">
        <h3>Personas Inscritas</h3>
        <p>Lista de atletas inscritas</p>
      </div>
    </div>
    
     
    <div class="item">
      <a  href="{{URL::to('edition/')}}"><img src="/dist/img/soccer-570836_1280.jpg" alt="Edicion"></a>
      <div class="carousel-caption">
        <h3>Edición</h3>
        <p>Lista de ediciones registradas</p>
      </div>
    </div>
    
    <div class="item">
      <a  href="{{URL::to('sport/')}}"><img src="/dist/img/1300x600_fit_Bike-und-_Mountainbike-im-_Gasteinert.jpg" alt="Deportes"></a>
      <div class="carousel-caption">
        <h3>Deportes</h3>
        <p>Lista de deportes registrados</p>
      </div>
    </div>
    
    <div class="item">
      <a  href="{{URL::to('category/')}}"><img src="/dist/img/basketball-2258650_1280.jpg" alt="Categorías"></a>
      <div class="carousel-caption">
        <h3>Categorías</h3>
        <p>Lista de categorías registradas</p>
      </div>
    </div>
    
    <div class="item">
      <a  href="{{URL::to('test/')}}"><img src="/dist/img/motion-1500x1000.jpg" alt="Pruebas"></a>
      <div class="carousel-caption">
        <h3>Pruebas</h3>
        <p>Lista de pruebas registradas</p>
      </div>
    </div>
    
    <div class="item">
      <a  href="{{URL::to('district/')}}"><img src="/dist/img/1300x600_fit_Bike-und-_Mountainbike-im-_Gasteinert.jpg" alt="Distritos">
      <div class="carousel-caption">
        <h3>Distritos</h3>
        <p>Lista de distritos registrados</p>
      </div>
    </div>
    
    <div class="item">
       <a  href="{{URL::to('/community')}}"><img src="/dist/img/soccer-570836_1280.jpg" alt="Comunidades">
      <div class="carousel-caption">
        <h3>Comunidades</h3>
        <p>Lista de comunidades registradas</p>
      </div>
    </div>
    <div class="item">
     <a  href="{{URL::to('/reportCategory')}}"><img src="/dist/img/basketball-2258650_1280.jpg" alt="Tipos de usuarios"></a>
      <div class="carousel-caption">
        <h3>Reporte</h3>
        <p>Listado de atletas por categoría</p>
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
