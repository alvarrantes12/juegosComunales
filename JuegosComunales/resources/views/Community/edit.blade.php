@extends('adminMasterPage')

@section('adminContent')

   <div class="col-md-10 col-md-offset-1 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Actualizar comunidad</h4>
               </div>
               <div class="panel-body">
   
   
   <form class="form-horizontal" role="form" method='POST' action="{{ url('editCommunity/') }}">
      {{ csrf_field() }} 
      <label for="" class="col-lg-4 control-label">Nombre de la comunidad</label>
      <div class="col-lg-6">
         <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" type="text" class="form-control" id="community" name="community" placeholder="Ej: Barrio Latino" value= "{{$Community->nameCommunity}}" >
         <input type="text" class="form-control" id="idCommunity" name="idCommunity" value= "{{$Community->IDCommunity}}" style="display:none" required autofocus>
      </div>
      <br><br>
      <div>
         <label for="" class="col-lg-4 control-label">Distrito</label>
         <div class="btn-group col-lg-6">
            <select class="form-control" id="district" name="district">
               <option value ='{{$Community->IDDistrict}}' selected>{{$Community->nameDistrict}}</option>
               @foreach ($district as $d)
               <option value ='{{$d->IDDistrict}}'>{{$d->nameDistrict}}</option>
               @endforeach
            </select>
         </div>
      </div>
      <br><br>
      <div class="col-lg-offset-8 col-lg-4">
         <a href="{{URL::to('community/')}}"><button type="button" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button></a>
         <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Aceptar</span></button>
      </div>
   </form>
    </div>
 </div>
</div>
   
@endsection
