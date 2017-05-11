<?php
include_once ("db.php");

class usuario extends db{

	function __construct()
	{
		parent::__construct();
	}
	public function insertarUsuario($idcategoria,$nombre,$apellidos,$usuario,$email,$password,$rol="usuario"){
	  $sqlInsercion="INSERT INTO usuario(id,idCategoria,nombre,apellidos,usuario,email,pass,rol) VALUES(NULL,'".$idcategoria."','".$nombre."','".$apellidos."','".$usuario."','".$email."','".sha1($password)."','".$rol."')";
	     $resultado=$this->realizarConsulta($sqlInsercion);
	     if ($resultado!=null) {
	     	return true;
	     }else{
	     	return false;
	     }
	}

	public function checkearEmail($email){
	  $sqlInsercion="SELECT * FROM usuario WHERE email='".$email."'";
	     $resultado=$this->realizarConsulta($sqlInsercion);
	     if ($resultado->num_rows != null) {
	     	return true;
	     }else{
	     	return false;
	     }
	}

	 function buscarUsuario($user){

	    $sql="SELECT * from usuario WHERE usuario='".$user."'";

	    $resultado = $this->realizarConsulta($sql);
	    if ($resultado->num_rows != null) {
	     	return $resultado;
	     }else{
	     	return false;
	     }
	}
	function buscarLogin($usuario){
	    $sql="SELECT * from usuario WHERE usuario='".$usuario."'";

	    $resultado=$this->realizarConsulta($sql);
	    if($resultado!=false){
	        return $resultado->fetch_assoc();
	    }else{
	        return null;
	      }
  	}
  	 function buscarUsuarioInsert($usuario){
	    $sql="SELECT * from usuario WHERE usuario='".$usuario."'";
	    return $resultado=$this->realizarConsulta($sql);
	}

  	public function actualizarUsuario($email,$nombre,$apellidos,$rol,$id){
  	$sqlActualizar="UPDATE usuario SET email='".$email."',nombre='".$nombre."',apellidos='".$apellidos."',rol='".$rol."' WHERE id='".$id."'" ;
  		return $resultado=$this->realizarConsulta($sqlActualizar);
  	}

}
?>
