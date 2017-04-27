<!DOCTYPE html>
<html lang="en">
<head>
  <title>Resultado</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href=<?= asset_url()."images/icono.ico"?>>
</head>
<body>

<div class="container">

  <!-- Trigger the modal with a button -->
  <button type="button" id="boton" style="visibility:hidden" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Resultado de la base de datos</h4>
        </div>
        <div class="modal-body">
          <p><?= $res?></p>
        </div>
        <div class="modal-footer">
          <button  type="button" id="aceptar" class="btn btn-default" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
  document.getElementById("boton").click();
  $('#aceptar').click(function () {
  window.location.replace("delete");
  });
</script>
</html>