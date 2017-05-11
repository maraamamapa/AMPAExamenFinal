<?php
include './modelo/car.php';

$carrera=new carrera();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>...</title>
  </head>
  <body>
    <div class="menu">
        <a href="index.php">index</a>
        <a href="nuevacarrera.php">nueva_carrera</a>
        <a href="listarcarreras.php">listar_carreras</a>
        <a href="registro.php">Registrate</a>
    </div>
    <div class="contenido">
      <?php
      if ($carrera->getErrorConexion()==true) {
        echo "No hay conexion";
      }
      else {
      if (!empty($_POST)) {
        $id=0;
        $insertado=$carrera->Insertamecar($_POST['carrera'],
                                            $_POST['fecha'],
                                            $idusuario,$_POST['tiempo']);
        if($insertado!=null){
          echo "Inserccion correcta";
          foreach ($insertado as $key => $fila) {
            echo "carrera:".$fila["carrera"]."<br>";
            echo "tiempo:".$fila["tiempo"]."<br>";
            echo "fecha:".$fila["fecha"]."<br>";

          }
      }else{
        echo "No ha sido insertada ";

      }
  }
       ?>
      <form class="" action="nuevacarrera.php" method="post">
        <label for="carrera">Carrera:</label>
        <input type="text" name="carrera" value="" required><br><br>
        <label for="tiempo">Tiempo:</label>
        <input type="text" name="tiempo" value="" required><br><br>
        <label for="fecha">Fecha:</label>
        <input type="text" name="fecha" value="" required><br><br>
        <input type="submit" name="" value="Enviar">
      </form>
    </div>
  <?php
  }
 ?>
  </body>
</html>
