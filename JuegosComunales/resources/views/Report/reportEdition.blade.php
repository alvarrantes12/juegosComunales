<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte <?=  $date; ?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<style>
 
 .col-md-12 {
    width: 100%;
} 

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background-color: #fff;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}


.box-header .box-title {
    display: inline-block;
    text-align:center;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;

}
.encabezado{
    margin-left:500px;
    
}

.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}


.table-bordered {
    border: 1px solid #f4f4f4;
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

table {
    background-color: #fff;
}

 .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #f4f4f4;
}

.h{
    background-color: #fff;
}

.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}

.bg-red {
    background-color: #dd4b39 !important;
}
tr:nth-child(odd) {
  background-color:#f2f2f2;
}
tr:nth-child(even) {
  background-color:#fbfbfb;
}

</style>
	  
</head>
<body>

<div class="col-md-12">
              <div class="box">
                  <table class="table  text-right">
                      <tr class="h">
                          <td></td>
                          <td><h1 align="center">Comité Cantonal de Deportes y Recreación de Grecia</h1></td>
                          <td><img src="dist/img/LogoComite.png"></img></td>
                      </tr>
                  </table>
                    <img src="dist/img/fondo.jpg"  alt="Bandera Grecia" width="100%" height="10">
                      <br> 
                  <h3  align="center">Todos los atletas registrados en la edición <?=  $edition; ?> </h3>
                  <br>
                  
                   <h3  class="box-title">Fecha: <?=  $date; ?></h3>
                  
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-hover table-striped text-left">
                  <thead>
                     <tr>
                      <th >Identificación</th>
                      <th>Nombre</th>
                       <th>1er Apellido</th>
                        <th>2do Apellido</th>
                         <th>Rama</th>
                      
                        <th>Deporte</th>
                         <th>categoria</th>
                            <th>Distrito</th>
                       <th>Comunidad</th>
                     
                      
                     </tr>
                  </thead>
                    <tbody>
                  <?php foreach($data as $c){ ?>
                 
                    <tr>
                      <!--<td style="width: 10px" ><?= $c->IDCategory; ?></td>-->
                      <td><?= $c->IDPerson; ?></td>
                      <td><?= $c->name; ?></td>
                      <td><?= $c->lastName1; ?></td>
                      <td><?= $c->lastName2; ?></td>
                      <?php if( $c->gender == 'F'){?>
                       <td>Femenino</td>
                        <?php  } else { ?>
                        <td>Masculino</td>
                         <?php  } ?>
                      <td><?= $c->nameSport; ?></td>  
                      <td><?= $c->nameCategory; ?></td>
                       <td><?= $c->nameDistrict; ?></td>    
                      <td><?= $c->nameCommunity; ?></td>
                    
                      
                    </tr>
                    
                    <?php  } ?>
                   
                  </tbody>

                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  
                </div>
              </div><!-- /.box -->

              
            </div>
<script type="text/php">
        if ( isset($pdf) ) {
            // OLD 
            // $font = Font_Metrics::get_font("helvetica", "bold");
            // $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(255,0,0));
            // v.0.7.0 and greater
            $x = 265;
            $y = 750;
            $text = "{PAGE_NUM} de {PAGE_COUNT}";
            $font = $fontMetrics->get_font("helvetica", "normal");
            $size = 14;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>

	
</body>



                    
</html>


