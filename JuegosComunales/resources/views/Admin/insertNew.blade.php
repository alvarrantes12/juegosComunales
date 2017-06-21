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

Clase: users
Vista que se encarga de crear un formulario con el fin de mostrar los atletas inscritos-->

@extends('adminMasterPage')
@section('adminContent')

   <section>
      <div class="row">
        
         <div class="col-md-7 col-md-offset-2 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                 <h4 style="color: #899B82;">Nuevo participante</h4>
               </div>
               <div class="panel-body">
                  
                   <form class="form-horizontal" role="form" method='POST' id="newP" name="newP" action="{{ url('insertA/') }}">
                 {{ csrf_field() }} 
                  
                     
                     <div  >
                     <label for="" class="col-lg-4 control-label">Numero de identificacion</label>
                     <div class="col-lg-6">
                        <input type="text"  class="form-control" name="IDPerson" id="IDPerson" placeholder="" pattern="^[\s\S]{0,191}$" required autofocus>
                     </div>
                  </div>
              
                  <div  >
                     <label for="" class="col-lg-4 control-label">Nombre</label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" name="name" id="name" placeholder="" pattern="^[\s\S]{0,25}$" title="Maximo 25 letras"  required autofocus>
                     </div>
                  </div>
                  <div  >
                     <label for="" class="col-lg-4 control-label">Primer Apellido</label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control"  name="lastName1" id="lastName1" placeholder="" pattern="^[\s\S]{0,12}$" title="Maximo 12 letras" required autofocus>
                     </div>
                  </div>
                  <div  >
                     <label for="" class="col-lg-4 control-label">Segundo Apellido</label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" name="lastName2" id="lastName2" placeholder="" pattern="^[\s\S]{0,12}$" title="Maximo 12 letras" required autofocus>
                     </div>
                  </div>
                  <div  >
                     <label for="" class="col-lg-4 control-label">Fecha de nacimiento</label>
                     <div class="col-lg-6">
                        <div class='input-group date' id='startDate'>
                           <input placeholder = "Seleccione una fecha" name = "birthDate" type='text' class="form-control" id='birthDate' autocomplete='off' pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" title="La fecha debe ser año-mes-dia" onchange="changeEventHandler(event);" required autofocus/>
                           <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div  >
                     <label for="" class="col-lg-4 control-label">Correo electronico</label>
                     <div class="col-lg-6">
                        <input type="email" class="form-control" name="email" id="email"
                           placeholder="xxx@yyy.zzz" >
                     </div>
                  </div>
                  
                   <div  >
                     <label for="" class="col-lg-4 control-label">Numero Telefonico</label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" name="telephone" id="telephone" pattern="^[0-9]{1}[\-][0-9]{3}[\-][0-9]{2}[\-][0-9]{2}" title="Formato incorrecto, Solo 8 digitos son permitidos y con el formato 2-345-67-89" placeholder="2-494-01-02" >
                     </div>
                  </div>
                  
                  
                  <div>
                   <label for="" class="col-lg-4 control-label">Distrito</label>
                   <div class="btn-group col-lg-6">
                   <select  class="form-control" id="district" name="community" >
                   <option value="" selected>Seleccione un distrito...</option>
                   @foreach ($district as $p)
                   <option value ='{{$p->IDDistrict}}'>{{$p->nameDistrict}}</option>
                   @endforeach
                   </select>
                   </div>
                  </div>
                  
                  
                  <div>
                   <label for="" class="col-lg-4 control-label">Comunidad</label>
                   <div class="btn-group col-lg-6">
                   <select class="form-control" id="community" name="community" required autofocus>
                   <option value="" selected>Seleccione una comunidad...</option>
                   @foreach ($community as $c)
                   <option value ='{{$c->IDCommunity}}'>{{$c->nameCommunity}}</option>
                   @endforeach
                   </select>
                   </div>
                  </div>
                  
                  <div>
                   <label for="" class="col-lg-4 control-label">Tipo de participante</label>
                   <div class="btn-group col-lg-6">
                   <select class="form-control" id="role" name="role" required autofocus>
                   <option value="" selected>Seleccione un tipo de participante...</option>
                   @foreach ($role as $r)
                   <option value ='{{$r->IDRole}}'>{{$r->role}}</option>
                   @endforeach
                   </select>
                   </div>
                  </div>
                
                  <div>
                     <div class="col-lg-offset-2 col-lg-10">
                        <a href="{{URL::to('newDoc/')}}"> 
                        <button  class="btn btn-info"><span class="glyphicon"> </span><span>Continuar  &rarr;</span></button>
                        </a>
                     </div>
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
                  $('#birthDate').datetimepicker({locale: 'es', format: 'YYYY-MM-DD'});
                  $('#birthDate2').datetimepicker({locale: 'es', format: 'YYYY-MM-DD'});
              });
      	});
      
   </script>

@endsection