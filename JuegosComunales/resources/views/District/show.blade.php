@extends('adminMasterPage')
@section('adminContent')


<section>
      <div class="row">

<div class="col-md-12 col-md-offset-0 text-center">
     @if (Session::has('district'))
             <div align = "center">
             <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session::get('district')}}</div></div>
            @endif
            <div class="panel panel-success">
                
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Distritos Registrados</h4>
               </div>
               <div class="panel-body">
                   
<div class="col-md-12">
    <div class="table-responsive">
        <table  class="table table-hover table-striped ">
            <td>
               <form class="form-horizontal" role="form" method="POST" action="{{url('searchDistrict/')}}" >
                        {{ csrf_field() }}
                    <div class="col-md-8">
                        <input pattern="^[\d\s\S]{0,25}$" title="Maximo 25 carácteres"  id="filter" placeholder='Digite el nombre del distrito' type="text" class="form-control" name="filter" value="{{ old('filter') }}" required autofocus>
                        @if ($errors->has('filter'))
                            <span class="help-block">
                                <strong>{{$errors->first('filter')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 ">
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"> </span><span>  Buscar</span></button>
                        </div>
                    </div>
                </form>
                             
            </td>
            <td >
                <div class="col-md-12 ">
                   <a href="{{URL::to('addDistrict/')}}"> <button class="btn btn-info"><span class="glyphicon glyphicon-plus"> </span><span>  Agregar Nuevo Distrito</span></button></a>
              </div>
            </td> 
        </div>
    </table>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-hover table-striped text-left">
            <thead>
                <th>Distrito</th>
                <th>Estado</th
                <th></th>
                <th></th>
            </thead>
             @if(count($district) < 1)
             <div class="col-md-12">
                <td>No hay datos para mostrar</td>
            </div>
               @endif
            @foreach($district as $p)
            <tr>
                <td>
                    {{$p->nameDistrict}}
                </td>
                 @if ($p->active == 1)
                        <td>Activo</td>
                     @else
                        <td>Inactivo</td>
                     @endif
                
                <td>
                   <a href="{{URL::to('editDistrict/'.$p->IDDistrict)}}">
                       <i class="fa fa-pencil-square-o "></i><span> Editar</span>
                   </a>
               </td>
               
               @if ($p->active == 1)
                            <td>
                            <a href="{{URL::to('/deleteDistrictt/' . $p->IDDistrict)}}">
                            <i class="fa fa-times"></i> <span>Desactivar</span>
                            <!-- <small class="label pull-right bg-red">PDF</small> -->
                            </a>
                           </td>
                           @else
                           <td>
                            <a href="{{URL::to('/deleteDistrictt/' . $p->IDDistrict)}}">
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
