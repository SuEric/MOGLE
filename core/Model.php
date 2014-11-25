<?php
/**
* Es donde van a extender todos nuestros modelos
*
*/
class Model{
	private $conexion;
	private $query;
	private $rows = array();
	private $escalar;

	private  function abrirConexion(){
		$this->conexion =  new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	}

	private function cerrarConexion(){
		$this->conexion->close();
	}

	public function executeSingleQuery(){
		$this->abrirConexion();
		if(!$this->conexion->query($this->query)){
			echo mysqli_error($this->conexion);
		}
		$filas = $this->conexion->affected_rows;
		$this->cerrarConexion();
		return $filas;
	}

	public function getResultsFromQuery(){
		$this->abrirConexion();
		$result = $this->conexion->query($this->query);
		while($data = $result->fetch_assoc()){
				$this->rows[] = $data;
		}
		$result->close();
		$this->cerrarConexion();
	}

	public function executeScalar()
	{
		unset($this->rows);
		$this->abrirConexion();
		$result = $this->conexion->query($this->query);
		$this->rows[] =  $result->fetch_array();
		$this->escalar = $this->rows[0][0];
		$result->close();
		$this->cerrarConexion();
	}

	public function setQuery($query){
		 $this->query = $query;
	}

	public function getRows(){
		 return $this->rows;
	}

	public function getScalar(){
		return $this->escalar;
	}

	/*public function executeDelete(){
		executeSingleQuery()
		$result->$mysqli->affected_rows

	}*/






//	function __destruct() { 	}
}