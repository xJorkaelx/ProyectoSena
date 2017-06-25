<?php 
	
	class Conexion{
	
	var $servidor;
	var $usuario;
	var $database;
	var $pass;
	var $conect;

	function __construct(){
		$this->servidor = "localhost";
		$this->usuario = "root";
		$this->database = "proyectosena";
		$this->pass = "";
	}


	function conectar(){
		$conexion = new PDO('mysql:host='.$this->servidor.';dbname='.$this->database,$this->usuario,$this->pass);
		$this->conect = $conexion;
	}


	function open(){
		$this->conectar();
		return $this->conect;
	}

	function close(){
		$this->conexion = null;
	}

	}

 ?>