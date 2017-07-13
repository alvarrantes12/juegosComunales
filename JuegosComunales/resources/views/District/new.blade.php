@extends('adminMasterPage')

@section('adminContent')


<div class="col-md-10 col-md-offset-1 text-center">
           @if (Session::has('district'))
             <div align = "center">
             <div class="alert alert-danger">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('district')}}</div></div>
            @endif
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Nuevo Distrito</h4>
               </div>
               <div class="panel-body">
                   
<form class="form-horizontal" role="form" method="POST" action="{{url('newDistrict/')}}" >
 
      {!!csrf_field() !!}
    <label for="" class="control-label col-sm-offset-1 col-sm-3" >Nombre del distrito:</label>
    <div class="col-sm-6">
      <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" type="text" class="form-control" id="district" name="district" placeholder="Ej: Grecia Centro" value="{{ old('district') }}" required autofocus>
       @if ($errors->has('district'))
        <span class="help-block">
        <strong>{{$errors->first('district')}}</strong>
        </span>
       @endif
    </div>
    <div class="col-lg-offset-8 col-lg-4">
       <div>
           <br>
          <a href="{{URL::to('showDistrict/')}}"><button type="button" class="btn btn-info"><span class="glyphicon"> </span><span>Cancelar</span></button></a>
         <button type="submit" class="btn btn-info"><span class="glyphicon"> </span><span>Aceptar</span></button>
      </div>
    </div>
  </form>
  <div class="col-lg-offset-8 col-lg-4">

 </div> 
  </div>


</section>
@endsection