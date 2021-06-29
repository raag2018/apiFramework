<?php 
	/*
	SQL
	CREATE DATABASE tutorial;
	CREATE TABLE if not exists framework(
		id int not null primary key auto_increment,
		nombre varchar(20) not null,
		lanzamiento int(4) not null,
		desarrollador varchar(30) not null 
	);
	*/
	class conectar{
		function conexion(){
			$password = '';
			$user = "";
			$bdd = "";
			$pathServer = 'localhost';
			$port = '3306';
			try {
				$base = new PDO("mysql:host=".$pathServer.";port=".$port.";dbname=".$bdd.";options=\'--client_encoding=UTF8\'", $user, $password, array(PDO::ATTR_PERSISTENT => true));
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				die('Ocurrio un error: '.$e->getMessage());
			}
			return $base;
		}
	}
 ?>