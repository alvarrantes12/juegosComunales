@extends('adminMasterPage')
@section('adminContent')




<div class="col-md-12 col-md-offset-0 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Distritos Registradas</h4>
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
                <th></th>
                <th></th>
            </thead>
            @foreach($district as $p)
            <tr>
                <td>
                    {{$p->nameDistrict}}
                </td>
                <td>
                   <a href="{{URL::to('editDistrict/'.$p->IDDistrict)}}">
                       <i class="fa fa-pencil-square-o "></i><span> Editar</span>
                   </a>
               </td>
               <td>
                   <a href="{{URL::to('deleteDistrict/'.$p->IDDistrict)}}">
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
