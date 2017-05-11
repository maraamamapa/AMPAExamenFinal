<?php
include_once ("db.php");
/**
 *
 */
class Carrera extends db{

  function __construct()
  {

    parent::__construct();
  }
  //-- Funcion para que INSERTAR un Equipo y MOSTRARLO --\\
  public function Insertamecar($carrera,$fecha,$idusuario,$tiempo){
    if($this->getErrorConexion()==false){
      $sqlInsercion="INSERT INTO carrera(id,carrera,fecha,idusuario,tiempo) Values(NULL,'".$carrera."','".$fecha."','".$idusuario."','".$tiempo."')";
      $this->conexion->query($sqlInsercion);
      $sql="SELECT * FROM carrera ORDER BY id  DESC LIMIT 1 ";
      return $resultado=$this->realizarConsulta($sql);
    }else{
      return null;
    }
    }
    public function mostrarCar(){
      if($this->getErrorConexion()==false){
      $sql="SELECT * FROM carrera";
      return  $resultado=$this->realizarConsulta($sql);
      }else{
        return null;
      }
    }
    public function mostrarCat(){
      if($this->getErrorConexion()==false){
      $sql="SELECT  id,categoria FROM categoria";
      return  $resultado=$this->realizarConsulta($sql);
      }else{
        return null;
      }
    }
}
?>
