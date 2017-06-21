@extends('adminMasterPage')
@section('adminContent')



   <div class="col-md-12 col-md-offset-0 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                 <h4 style="color: #899B82;">Comunidades Registradas</h4>
               </div>
               <div class="panel-body">

<div class="col-md-12">
    <div class="table-responsive">
        <table  class="table table-hover table-striped">
            <td aling="center">
                
               <form class="form-horizontal" role="form" method="GET" action="{{url ('searchCommunity/')}}">
                        {{ csrf_field() }}
                    <div class="col-md-9">
                        <input id="filtrar" pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres" placeholder='Digite el nombre de la comunidad o del distrito' type="text" class="form-control" name="filter" value="{{ old('filter') }}" required autofocus>
                        @if ($errors->has('filter'))
                            <span class="help-block">
                                <strong>{{$errors->first('filter')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 ">
                            <a><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"> </span><span>  Buscar</span></button></a>
                        </div>
                    </div>
                </form>
    </div>
</div>
                    
                
                             
            </td>
            <td align="center">
                <div class="col-md-12 ">
                   <a href="{{URL::to('addCommunity/')}}"> <button class="btn btn-info"><span class="glyphicon glyphicon-plus"> </span><span>  Agregar Nueva Comunidad</span></button></a>
              </div>
            </td> 
        </div>
    </table>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-hover table-striped text-left">
            <thead>
                <th>Nombre de la comunidad</th>
                <th>Distrito </th>
                <th></th>
                <th ></th>
           </thead>
           @foreach ($community as $c)
           <tr>
               <td>{{$c->nameCommunity}}</td>
               <td>{{$c->nameDistrict}}</td>
                <td>
                   <a href="{{URL::to('/editCommunity/'.$c->IDCommunity)}}">
                       <i class="fa fa-pencil-square-o "></i><span> Editar</span>
                   </a>
               </td>
               <td>
                   <a href="{{URL::to('deleteCommunity/'.$c->IDCommunity)}}">
                       <i class="fa fa-trash-o"></i><span> Eliminar</span>
                   </a>
               </td>
           </tr>
           @endforeach
        </table>
        </div>
                    </div>
                    </div>
    </div>
</div>
@endsection