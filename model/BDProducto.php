<?php 
	
	require_once "conexion.php";

	class BDProducto extends Conexion {

		#NOMBRE DE LA TABLA
		public $tabla = "producto";

		#INSERTAR UN PRODUCTO
		
		public function addProducto($producto) {
			$sql ="INSERT INTO $tabla VALUES (NULL,:nombre,:tipo,:codigo,:ganancia,:stock_max,:stock_min,:imagen,:marca)";
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":nombre", $producto["nombre"], PDO::PARAM_STR);
			$st->bindParam(":tipo", $producto["tipo"], PDO::PARAM_STR);
			$st->bindParam(":codigo", $producto["codigo"], PDO::PARAM_STR);
			$st->bindParam(":ganancia", $producto["ganancia"], PDO::PARAM_STR);
			$st->bindParam(":stock_max", $producto["stock_max"], PDO::PARAM_INT);
			$st->bindParam(":stock_min", $producto["stock_min"], PDO::PARAM_INT);
			$st->bindParam(":imagen", $producto["imagen"], PDO::PARAM_BLO);
			$st->bindParam(":marca", $producto["marca"], PDO::PARAM_INT);
			if ($st->execute()) {
				return "success";
			} else {
				return "error";
			}
			$st->close();
		}

		#GET PRODUCTO
		
		public function getProductos($id) {
			$sql = "SELECT * FROM $tabla WHERE (id = :id)";
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":id", $id, PDO::PARAM_INT);
			$st->execute();
			return $st->fetch();
			$st->close();

		#GET PRODUCTOS
		
		public function getProductos() {
			$sql = "SELECT * FROM $tabla";
			$st = Conexion::conectar()->prepare($sql);
			$st->execute();
			return $st->fetchAll();
			$st->close();
		}
	}
?>