<?php
include './modelo/car.php';
$carrera=new carrera();
include "./seguridad/seguridad.php";
$seguridad = new Seguridad();
if ($seguridad->getUsuario() == null) {
	header('Location: index.php');
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>...</title>
  </head>
  <body>
          <a href="index.php">index</a>
        <a href="nuevacarrera.php">nueva_carrera</a>
          <a href="listarcarreras.php">listar_carreras</a>
        <a href="registro.php">registro</a></li>

    <div class="contenido">
      <?php
      if ($carrera->getErrorConexion()==true) {
        echo "No hay conexion";
      }
      else {
        $tabla=$carrera->mostrarCar();
      ?>
      <table>
        <tr>
          <th>Carrera</th>
          <th>Tiempo</th>
          <th>Fecha</th>
        </tr>
    <?php
    foreach ($tabla as $fila) {
      echo "<tr>";
        echo "<td>".$fila["carrera"]."</td>";
        echo "<td>".$fila["tiempo"]."</td>";
        echo "<td>".$fila["fecha"]."</td>";
      echo "</tr>";
    }
    echo "</table>";
    } ?>

    </div>
  </body>
</html>
