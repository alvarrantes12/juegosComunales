@extends('adminMasterPage')

@section('adminContent')

  <section>
      <div class="row">
  <div class="col-md-10 col-md-offset-1 text-center">
      @if (Session::has('comm'))
             <div align = "center">
             <div class="alert alert-danger">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('comm')}}</div></div>
             @endif
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Nueva Comunidad</h4>
               </div>
               <div class="panel-body">
  
  
  
    <form class="form-horizontal" role="form" method='POST' action="{{ url('newCommunity/') }}">
      {{ csrf_field() }} 
      <label for="" class="col-lg-4 control-label">Nombre de la comunidad</label>
      <div class="col-lg-6">
         <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" type="text" class="form-control" id="community" name="community" placeholder="Ej: Barrio Latino" required autofocus>
        
      </div>
      <br><br>
      <div>
         <label for="" class="col-lg-4 control-label">Distrito</label>
         <div class="btn-group col-lg-6">
            <select class="form-control" id="district" name="district" required autofocus>
               <option value ="" selected>Seleccione un distrito...</option>
               @foreach ($district as $d)
               @if($d->active == 1)
               <option value ='{{$d->IDDistrict}}'>{{$d->nameDistrict}}</option>
               @endif
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
</div>
</section>

@endsection