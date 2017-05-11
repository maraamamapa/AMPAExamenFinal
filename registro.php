<?php
include './modelo/car.php';
include "./modelo/usuario.php";
include "./seguridad/seguridad.php";
$user=new usuario();
$seguridad = new Seguridad();
$carrera=new carrera();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>...</title>
  </head>
  <body>

    <div class="menu">
          <a href="index.php">index</a></li>
          <a href="nuevacarrera.php">nueva_carrera</a>
          <a href="listarcarreras.php">lista_carrera</a>
          <a href="registro.php">registro</a>
        </ul>
      </nav>
    </div>
    <?php
    if ($carrera->getErrorConexion()==true) {
      echo "No hay conexion";
    }
    else {
      $select=$carrera->MostrarCategorias();
    ?>
    <?php
    if(isset($_POST["accion"])){
      if($_POST["accion"]=="registro"){
        if (!empty($_POST["usuario"]) && !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["email"]) && !empty($_POST["contr1"])) {
          if($_POST["contr1"]==$_POST["contr2"]){

            $rol="usuario";
            $resultado=$user->insertarUsuario($_POST["idCategoria"],$_POST["nombre"],$_POST["apellidos"],$_POST["usuario"],$_POST["contr1"],$_POST["email"],$rol);
            if($resultado!=null){
              echo "<class='succes'>Usuario registrado correctamente";
              $resultado=$user->buscarUsuarioInsert($_POST["usuario"]);
              foreach ($resultado as $key => $fila) {
                echo "nombre : ".$fila["nombre"]."<br>";
                echo "apellidos: ".$fila["apellidos"]."<br>";
                echo "email : ".$fila["email"]."<br>";
                echo "idCategoria : ".$fila["idCategoria"]."<br>";

              }
              echo "<a href=index.php>Ve al login</a>";

            }else{
              echo "< class='fail'>El usuario no ha sido insertado. Revisa los datos";
              echo "< href=registro.php>Ve a registro</a>";
            }
          }else{
            echo "class='fail'>Las contraseñas no son iguales";
            echo "<a href=registro.php>Ve al registro</a>";
          }
        }else{
          header('Location: registro.php');
        }

      }
    }


if (!empty($_POST)) {
     ?>
    <div class="contenido">
      <form  action="registro.php" method="post">
        <h1>Registrarse</h1>
<?php



foreach ($resultado as $key => $fila) {
  echo "nombre : ".$fila["nombre"]."<br>";
  echo "apellidos: ".$fila["apellidos"]."<br>";
  echo "idCategoria : ".$fila["idCategoria"]."<br>";
  echo "email : ".$fila["email"]."<br>";
 ?>

        <label>usuario</label><br>
        <input type="text" name="usuario" value="<?php if (!empty($_POST)) {echo $fila["usuario"];} ?>" required><br><br>
        <label>Nombre</label><br>
        <input type="text" name="nombre" value="<?php if (!empty($_POST)) {echo $fila["nombre"];} ?>" required><br><br>
        <label>Apellidos</label><br>
        <input type="text" name="apellidos" value="<?php
                      if (!empty($_POST)) {echo $fila["apellidos"];} ?>" required><br><br>
        <label>Email</label><br>
        <input type="text" name="email" value="<?php
                              if (!empty($_POST)) {echo $fila["email"];} ?>" required><br><br>

        <label>Contraseña</label><br>
        <input type="password" name="contr1" value="" required><br><br>
        <label>Repite Contraseña</label><br>
        <input type="password" name="contr2" value="" required><br><br>

        <select name="idCategoria">
          <option value="">nada</option>
          <?php
          foreach ($select as $fila) {
             ?>
            <option value="<?php echo $fila['id'] ?>"><?php echo $fila['categoria'] ?></option>
            <?php
          }
}

           ?>

        </select>
        <input type="hidden" name="accion" value="registro">
        <input type="submit" name="" value="registrarse">


      </form>
      <?php
    }
      }
     ?>
     <?php
     if (empty($_POST)) {

      ?>
     <form  action="registro.php" method="post">
       <h1>Registrarse</h1>


       <label>usuario</label><br>
       <input type="text" name="usuario" value="" required><br><br>
       <label>Nombre</label><br>
       <input type="text" name="nombre" value="" required><br><br>
       <label>Apellidos</label><br>
       <input type="text" name="apellidos" value="" required><br><br>
       <label>Email</label><br>
       <input type="text" name="email" value="" required><br><br>

       <label>Contraseña</label><br>
       <input type="password" name="contr1" value="" required><br><br>
       <label>Repite Contraseña</label><br>
       <input type="password" name="contr2" value="" required><br><br>

       <select name="idCategoria">
         <option value="">nada</option>
         <?php
         foreach ($select as $fila) {
            ?>
           <option value="<?php echo $fila['id'] ?>"><?php echo $fila['categoria'] ?></option>
           <?php
         }


          ?>

       </select>
       <input type="hidden" name="accion" value="registro">
       <input type="submit" name="" value="registrarse">


     </form>
     <?php } ?>
    </div>
  </body>
</html>
