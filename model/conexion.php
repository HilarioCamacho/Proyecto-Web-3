<?php 
	class Conexion {

		#CONEXIÓN CON LA BASE DE DATOS

		public function conectar() {
			$cnn = new PDO("mysql:host=localhost;dbname=truper","root","fuckyeahman");
			return $cnn;
		}
	}

?>