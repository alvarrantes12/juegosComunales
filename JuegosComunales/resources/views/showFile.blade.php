@extends('adminMasterPage')

@section('adminContent')
  <div class="col-md-10 col-md-offset-1 text-center">
            <div class="panel panel-success">
               <div class="panel-heading">
                  <h4 style="color: #899B82;">Registros que van a ser Guardados</h4>
               </div>
               <div class="panel-body">
  
   <form method="GET" action="{{url ('excelData/')}}">
            
           {{ csrf_field() }}
            
            <div class="form-group">
                          <div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-hover table-striped text-left">
            <thead>
                <th>Numero de identificacion</th>
            <th>Nombre del atleta</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Fecha de nacimiento</th>
            
           
         <th></th>
            <th></th>
           </thead>
          
            @foreach ($person as $value)
            @if ($value->identificacion != '' && $value->nombre != '' && $value->primer_apellido != '' && $value->segundo_apellido != '' &&
          $value->fecha_nacimiento != '' && $value->tipo_sangre != '' && $value->peso_en_kilos != '' 
          && $value->estatura_en_centimetros != '')
               
                <tr>
                  <td>{{$value->identificacion}}</td>
                  <td>{{$value->nombre}}</td>
                  <td>{{$value->primer_apellido}}</td>
                  <td>{{$value->segundo_apellido}}</td>
                  <td>{{$value->fecha_nacimiento}}</td>
                  
                </tr>
                @endif
              @endforeach
        
          
        </table>
            </div>


</div>
              
             
               <div class="col-md-6 col-md-offset-4">
                 <a href="{{URL::to('excel/')}}"><button type="button" class="btn btn-primary">Cancelar</button></a>
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>
            </div>
          </form>
  

</div>
</div>

@endsection
