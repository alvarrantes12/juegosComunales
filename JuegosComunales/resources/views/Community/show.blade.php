@extends('adminMasterPage')
@section('adminContent')

<section>
      <div class="row">

   <div class="col-md-12 col-md-offset-0 text-center">
            <div class="panel panel-success">
                 @if (Session::has('community'))
             <div align = "center">
             <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('community')}}</div></div>
            @endif
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
             @if(count($community) < 1)
                <td>No existe coincidencia para su búsqueda</td>
               @endif
           
           @foreach ($community as $c)
           <tr>
               <td>{{$c->nameCommunity}}</td>
               <td>{{$c->nameDistrict}}</td>
                <td>
                   <a href="{{URL::to('/editCommunity/'.$c->IDCommunity)}}">
                       <i class="fa fa-pencil-square-o "></i><span> Editar</span>
                   </a>
               </td>
               
                     @if ($c->active == 1)
                            <td>
                            <a href="{{URL::to('/deleteCommunityy/' . $c->IDCommunity)}}">
                            <i class="fa fa-times"></i> <span>Desactivar</span>
                            <!-- <small class="label pull-right bg-red">PDF</small> -->
                            </a>
                           </td>
                           @else
                           <td>
                            <a href="{{URL::to('/deleteCommunityy/' . $c->IDCommunity)}}">
                            <i class="fa fa-times"></i> <span>Activar</span>
                            <!-- <small class="label pull-right bg-red">PDF</small> -->
                            </a>
                           </td>
                        
                           @endif
                           
               
           </tr>
           @endforeach
        </table>
        </div>
                    </div>
                    </div>
    </div>
</div>
</div>
</section>
@endsection