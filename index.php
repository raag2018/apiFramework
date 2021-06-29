<?php 
	header('Access-Control-Allow-Origin: *');
	include "bd/bd.php";
	
	/*header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Allow: GET, POST, OPTIONS, PUT, DELETE");//cores*/
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['id'])){
			$query = "SELECT * FROM framework WHERE id = ".$_GET['id'].";";
			$resultado = metodoGet($query);
			echo json_encode($resultado->fetch(PDO::FETCH_ASSOC));
		}else{
			$query = "SELECT * FROM framework;";
			$resultado = metodoGet($query);
			echo json_encode($resultado->fetchAll());
		}
		header("HTTP/1.1 200 OK");
		exit();
	}
	if($_POST['METHOD'] == 'POST'){
		unset($_POST['METHOD']);
		$nombre = $_POST['nombre'];
		$lanzamiento = $_POST['lanzamiento'];
		$desarrollador = $_POST['desarrollador'];
		$query = "INSERT INTO framework(nombre,lanzamiento,desarrollador) VALUES('$nombre',$lanzamiento, '$desarrollador');";
		$queryAutoIncrement = "SELECT MAX(id) AS id FROM framework;";
		$resultado = metodoPost($query, $queryAutoIncrement);
		echo json_encode($resultado);
		header("HTTP/1.1 200 OK");
		exit();
	}
	if($_POST['METHOD'] == 'PUT'){
		unset($_POST['METHOD']);
		$id = $_GET['id'];
		$nombre = $_POST['nombre'];
		$lanzamiento = $_POST['lanzamiento'];
		$desarrollador = $_POST['desarrollador'];
		$query = "UPDATE framework SET nombre = '$nombre',lanzamiento = $lanzamiento, desarrollador = '$desarrollador' WHERE id = $id;";
		$resultado = metodoPut($query);
		echo json_encode($resultado);
		header("HTTP/1.1 200 OK");
		exit();
	}
	if($_POST['METHOD'] == 'DELETE'){
		unset($_POST['METHOD']);
		$id = $_GET['id'];
		$query = "DELETE FROM framework  WHERE id = $id;";
		$resultado = metodoDelete($query);
		echo json_encode($resultado);
		header("HTTP/1.1 200 OK");
		exit();
	}
	
	
	header("HTTP/1.1 400 Bad Request");
 ?>