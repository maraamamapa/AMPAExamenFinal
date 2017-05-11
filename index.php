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
          <a href="listarcarreras.php">lista_carreras</a>
          <a href="registro.php">Registrate</a>
    </div>
    <div class="contenido">
      <?php
      if(isset($_POST["accion"])){
    		if ($_POST["accion"]=="login") {
    			include "./modelo/usuario.php";
    			include "./seguridad/seguridad.php";

    			$user=new usuario();
    			$seguridad = new Seguridad();

    			$resultado=$user->buscarLogin($_POST["usuario"]);
    			if($resultado!=null){
    				//Comparamos los passwords     CON sha1 esta encriptado...
    				if($resultado["pass"]==sha1($_POST["contr1"])){
    					//con esta funcion hace sesion start en miperfil.php
    					$seguridad->addUsuario($_POST["usuario"]);
    					echo "logueado";
    				}else{
    					echo "<class='fail'>Las contraseñas no coinciden";
    				}
    			}else{
    				echo "<class='fail'>Usuario no encontrado";
    			}
    		}
    	}
	?>
		<form class="" action="index.php" method="post">
			<h1>Haz Login :</h1>
			<label>Usuario</label><br>
			<input type="text" name="usuario" value="" placeholder="usuario" ><br><br>
			<label>Contraseña</label><br>
			<input type="password" name="contr1" value="" placeholder="Introduce una contraseña" ><br><br>
			<input type="hidden" name="accion" value="login">
			<input type="submit" name="" value="entrar">
			<br>
			<a href="registro.php">registrate</a>
		</form>
    </div>
  </body>
</html>
