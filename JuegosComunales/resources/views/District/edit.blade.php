@extends('adminMasterPage')

@section('adminContent')

<section>
      <div class="row">
<div class="col-md-10 col-md-offset-1 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Editar Distrito</h4>
               </div>
               <div class="panel-body">
                   
<form class="form-horizontal" role="form" method="POST" action="{{url('editDistrict/')}}" >
  <div class="form-group">
      {!!csrf_field() !!}
    <label for="" class="control-label col-sm-offset-2 col-sm-2" >Nombre del distrito:</label>
    <div class="col-sm-6">
        <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" type="text" class="form-control" id="idDistrict" name="idDistrict" placeholder="Ej: Grecia Centro" style= "display:none" value= "{{$district->IDDistrict}}"required autofocus>
      <input type="text" class="form-control" id="district" name="district" placeholder="Ej: Grecia Centro" value= "{{$district->nameDistrict}}" required autofocus>
    </div>
  </div>
  <div class="col-lg-offset-8 col-lg-4">
     <a href="{{URL::to('showDistrict/')}}"><button type="button" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button></a>
     <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Aceptar</span></button>
    </div>
  </form>
   
  </div>
  </div>
  </div>
  </div>
</section>
@endsection