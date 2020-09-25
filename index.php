<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>IBOutplacement</title>

  </head>

  <body>

    <div class="col-lg-12" style="padding-top: 20px">
      
      <div class="card">

        <div class="card-header">
          
          <b>Importar Excel</b>

        </div>

        <div class="card-body">
          
          <form action="#" enctype="multipart/form-data">
            
            <div class="row"> 

              <div class="col-lg-8">
              
                <input type="file" id="txt_archivo" class="form-control" accept=".csv,.xlsx,.xls"><br>

              </div>

              <div class="col-lg-2">
                
                <button class="btn btn-danger" style="width: 100%" onclick="CargarExcel()">Cargar Excel</button><br>

              </div>

              <div class="col-lg-2">
                
                <button class="btn btn-primary" style="width: 100%" onclick="RegistrarExcel()" disabled id="btn_registrar">Guardar Datos</button><br>

              </div>

              <div class="col-lg-12" id="div_tabla"><br>
                
                <br>

              </div>

            </div>

          </form>

        </div>

      </div>

    </div>
    
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

  $('input[type="file"]').on('change', function(){

    var ext = $( this ).val().split('.').pop();
    
    if ($( this ).val() != '') {

      if(ext == "xls" || ext == "xlsx" || ext == "csv"){
      
      }
      else
      {
           $( this ).val('');
                  Swal.fire("Mensaje De Error","Extensión no permitida: ." + ext+"","error");
      }

     }

   });

  function CargarExcel()
  {
    var excel = $("#txt_archivo").val();
    if (excel =="") 
    {
      return Swal.fire("Mensaje de Advertencia", "Seleccionar un archivo excel", "warning");
    }

    var formData = new FormData();

    var files = $("#txt_archivo")[0].files[0];
    formData.append('archivoexcel',files);

    $.ajax({

      url:'importar_excel_ajax.php',
      type:'post',
      data:formData,
      contentType:false,
      processData:false,
      success : function(resp){

        $("#div_tabla").html(resp);
        document.getElementById('btn_registrar').disabled=false;
        
      }

    });
    return false;
  }

  function RegistrarExcel()
  {
    var contador = 0;
    var arreglo_idUsuario = new Array();
    var arreglo_nombres = new Array();
    var arreglo_interes = new Array();
    var arreglo_plan = new Array();
    var arreglo_rucodni = new Array();
    var arreglo_descripcion_taller = new Array();

    $("#tabla_detalle tbody#tbody_tabla_detalle tr").each(function()
      {
        arreglo_idUsuario.push($(this).find('td').eq(0).text());
        arreglo_nombres.push($(this).find('td').eq(1).text());
        arreglo_interes.push($(this).find('td').eq(2).text());
        arreglo_plan.push($(this).find('td').eq(3).text());
        arreglo_rucodni.push($(this).find('td').eq(4).text());
        arreglo_descripcion_taller.push($(this).find('td').eq(5).text());
        contador++;
      })

      if (contador==0) 
      {
        return Swal.fire("Mensaje de Advertencia","La tabla debe tener un dato","warning");
      }

      var idUsuario = arreglo_idUsuario.toString();
      var nombres = arreglo_nombres.toString();
      var interes = arreglo_interes.toString();
      var plan = arreglo_plan.toString();
      var rucodni = arreglo_rucodni.toString();
      var descripcion_taller = arreglo_descripcion_taller.toString();

      $.ajax({
        url:'controlador_registro.php',
        type: 'post',
        data: {
          id:idUsuario,
          n:nombres,
          i:interes,
          p:plan,
          r:rucodni,
          d:descripcion_taller  
        }
      }).done(function(resp){
        alert(resp);
      })
  }

</script>