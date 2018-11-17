<?php 
	
	require_once "conexion.php";

	class BDCatalogo extends Conexion {

		#NOMBRE DE LA TABLA
		public $tablap = "catalogo_principal";
		#NOMBRE DE LA TABLA 2
		public $tablas = "catalogo_secundario";

		# $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
		# CATALOGO PRINCIPAL O GENERAL
		# $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

		#REGISTRO DE CATALOGOS PRINCIPALES
		public function registroCatalogoPrincipal($datosModel) {
			$status = 1;
			$sql = "INSERT INTO catalogo_principal (nombre,descripcion, estatus) VALUES (:nombre, :descripcion, :estatus)";
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
			$st->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
			$st->bindParam(":estatus",$status, PDO::PARAM_INT);
			if($st->execute()) {
				return "success";
			} else {
				return "error";
			}
			$st->close();
		}

		# VISTA CATALOGOS PRINCIPALES
		public function getCatalogosPrincipales() {
			$sql = "SELECT * FROM catalogo_principal";
			$st = Conexion::conectar()->prepare($sql);
			$st->execute();
			return $st->fetchAll();
			$st->close();
		}

		#EDITAR CATALOGO PRINCIPAL
		public function editarCatalogoPrincipal($datos) {
			$sql = "SELECT * FROM catalogo_principal WHERE id=:id";
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":id",$datos,PDO::PARAM_INT);
			$st->execute();
			return $st->fetch();
			$st->close();
		}


		#ACTUALIZAR CATALOGO PRINCIPAL
		public function actualizarCatalogoPrincipal($datos) {
			$sql = "UPDATE catalogo_principal SET nombre=:nombre, descripcion=:descripcion WHERE id=:id";
			#var_dump($datos);
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
			$st->bindParam(":descripcion",$datos['descripcion'],PDO::PARAM_STR);
			$st->bindParam(":id",$datos['id'],PDO::PARAM_INT);
			if($st->execute()) {
				return "success";
			} else {
				return "error";
			}
			$st->close();
		}


		#BORRAR DE CATALOGO PRINCIPAL
		public function borrarCatalogoPrincipal($datos) {
			$sql = "DELETE FROM catalogo_principal WHERE id=:id";
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":id",$datos,PDO::PARAM_INT);
			if($st->execute()) {
				return "success";
			} else {
				return "error";
			}
			$st->close();
		}


		# $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
		# CATALOGO SECUNDARIO
		# $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

		# VISTA CATALOGOS PRINCIPALES
		public function getCatalogosSecundariosByPrincipal($datos) {
			$sql = "SELECT * FROM catalogo_secundario where id_catalogo=:id";
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":id",$datos["id_catalogo"],PDO::PARAM_INT);
			$st->execute();
			return $st->fetchAll();
			$st->close();
		}


		#REGISTRO DE CATALOGOS PRINCIPALES
		public function registroCatalogoSecundario($datosModel) {
			$status = 1;
			$cantidad = NULL;
			$img = NULL;
			$sql = "INSERT INTO catalogo_secundario (nombre,descripcion, cantidad, estatus, id_catalogo) VALUES (:nombre,:descripcion,:cantidad,:estatus,:id_catalogo)";
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
			$st->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
			$st->bindParam(":cantidad",$cantidad, PDO::PARAM_INT);
			$st->bindParam(":estatus",$status, PDO::PARAM_INT);
			$st->bindParam(":id_catalogo",$datosModel["id_catalogo"], PDO::PARAM_INT);
			if($st->execute()) {
				return "success";
			} else {
				return "error";
			}
			$st->close();
		}


		#BORRAR DE CATALOGO SECUNDARIO
		public function borrarCatalogoSecundario($datos) {
			$sql = "DELETE FROM catalogo_secundario WHERE id=:id";
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":id",$datos,PDO::PARAM_INT);
			if($st->execute()) {
				return "success";
			} else {
				return "error";
			}
			$st->close();
		}


		#EDITAR CATALOGO PRINCIPAL
		public function editarCatalogoSecundario($datos) {
			$sql = "SELECT * FROM catalogo_secundario WHERE id=:id";
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":id",$datos,PDO::PARAM_INT);
			$st->execute();
			return $st->fetch();
			$st->close();
		}


		#ACTUALIZAR CATALOGO PRINCIPAL
		public function actualizarCatalogoSecundario($datos) {
			$sql = "UPDATE catalogo_secundario SET nombre=:nombre, descripcion=:descripcion, cantidad=:cantidad WHERE id=:id";
			#var_dump($datos);
			$st = Conexion::conectar()->prepare($sql);
			$st->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
			$st->bindParam(":descripcion",$datos['descripcion'],PDO::PARAM_STR);
			$st->bindParam(":cantidad",$datos['cantidad'],PDO::PARAM_INT);
			$st->bindParam(":id",$datos['id'],PDO::PARAM_INT);
			if($st->execute()) {
				return "success";
			} else {
				return "error";
			}
			$st->close();
		}

	}
?>