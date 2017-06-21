@extends('layouts.app')

@section('content')
<div class="container">
 
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar archivos</div>
        <div class="panel-body">
          <div class="table-responsive">
               <table class="table table-hover table-striped text-left">
                  <thead>
                     <th>Nombre</th>
                     <th>Apellido1</th>
                     <th>Apellido2</th>
                    
                     
                  </thead>
                  @foreach ($result as $value)
                  <tr>
                     <td>{{$value->nombre}}</td>
                     
                     <td>{{$value->apellido1}}</td>
                     <td>{{$value->apellido2}}</td>
                     
                  @endforeach
               </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
