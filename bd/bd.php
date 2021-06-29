<?php 
	require_once("conexion.php");
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	function metodoGet($query){
		try {
			$obj = new conectar();
			$conn = $obj->conexion();
			$sentencia = $conn->prepare($query);
			$sentencia->setFetchMode(PDO::FETCH_ASSOC);
			$sentencia->execute();
			return $sentencia;
		} catch (Exception $e) {
			die("Error: ".$e);
		}
	}
	function metodoPost($query, $queryAutoIncrement){
		try {
			$obj = new conectar();
			$conn = $obj->conexion();
			$sentencia = $conn->prepare($query);
			$sentencia->execute();
			$idAutoIncrement = metodoGet($queryAutoIncrement)->fetch(PDO::FETCH_ASSOC);
			$resultado = array_merge($idAutoIncrement, $_POST);
			$sentencia->closeCursor();
			return $resultado;
		} catch (Exception $e) {
			die("Error: ".$e);
		}
	}
	function metodoPut($query){
		try {
			$obj = new conectar();
			$conn = $obj->conexion();
			$sentencia = $conn->prepare($query);
			$sentencia->execute();
			$resultado = array_merge($_GET, $_POST);
			$sentencia->closeCursor();
			return $resultado;
		} catch (Exception $e) {
			die("Error: ".$e);
		}
	}
	function metodoDelete($query){
		try {
			$obj = new conectar();
			$conn = $obj->conexion();
			$sentencia = $conn->prepare($query);
			$sentencia->execute();
			$sentencia->closeCursor();
			return $_GET['id'];
		} catch (Exception $e) {
			die("Error: ".$e);
		}
	}
 ?>