<?php 
	class CatalogosController {

		# $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
		# CATALOGO PRINCIPAL O GENERAL
		# $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

		#REGISTRO DE CATALOGOS PRINCIPALES
		public function registroCatalogoPrincipal(){
			if (isset($_POST["registro_catalogoP"])) {
				$datosController = array("nombre"=>$_POST["nombre"],
										 "descripcion"=>$_POST["descripcion"]);
				$respuesta = BDCatalogo::registroCatalogoPrincipal($datosController);
				if ($respuesta == "success") {
					echo '<script>
							window.location = "index.php?action=OK_CP";
						  </script>';
				} else {
					echo '<script>
							window.location = "index.php?action=ERROR_CP";
						  </script>';
				}
				return $respuesta;
			}
		}

		#ACTUALIZAR CATALOGO PRINCIPAL
		public function actualizarCatalogoPrincipal(){
			if (isset($_POST["editar_catalogoP"])) {
				$datos = array("id"=>$_POST["id"],
					           "nombre"=>$_POST["nombre"],
					           "descripcion"=>$_POST["descripcion"]);
				$respuesta = BDCatalogo::actualizarCatalogoPrincipal($datos);
				if ($respuesta == "success") {
					echo '<script>
							window.location = "index.php?action=OK_UCP";
						  </script>';
				}
			}
		}

		#BORRAR CATALOGO PRINCIPAL
		public function eliminarCatalogoPrincipal(){			
			if (isset($_GET["id_ECP"])) {
				$datos = $_GET["id_ECP"];
				$respuesta = BDCatalogo::borrarCatalogoPrincipal($datos);
				if ($respuesta == "success") {
					echo '<script>
							window.location = "index.php?action=OK_ECP";
						  </script>';
				}
			}
		}

		#VISTA CATALOGOS PRINCIPALES
		public function vistaCatalogoPrincipal(){
			$respuesta = BDCatalogo::getCatalogosPrincipales();
			$cont = 1;
			foreach ($respuesta as $row => $item ) {
				echo '<tr>
						<td>'.$cont.'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$item["descripcion"].'</td>
						<td>
							<a href="index.php?action=editarCP&id_UCP='.$item["id"].'">
								<button class="btn btn-info" data-toggle="modal" data-target="#cpEditar"><i class="fa fa-edit"></i></button>
							</a>
      						<a href="index.php?action=catalogoGeneral&id_ECP='.$item["id"].'">
								<button class="btn btn-danger"><i class="fa fa-times-circle"></i></button>
							</a>
							<a href="index.php?action=catalogoSecundario&id_CP='.$item["id"].'">
								<button class="btn btn-warning"><i class="fa fa-list-alt"></i></button>
							</a>
						</td>
					</tr>';
				$cont += 1;
			}
		}


		#EDITAR CATALOGO PRINCIPAL
		public function editarCatalogoPrincipal(){
			$id = $_GET["id_UCP"];
			$respuesta = BDCatalogo::editarCatalogoPrincipal($id);
			echo '
				  <div class="form-row p-1">
	                <label for="id">Clave:</label>
	                <input type="text" name="id" class="form-control" value="'.$respuesta["id"].'" readonly>
	              </div>
				  <div class="form-row p-1">
	                <label for="nombre">Nombre:</label>
	                <input type="text" name="nombre" class="form-control" value="'.$respuesta["nombre"].'" required>
	              </div>
	              <div class="form-row p-1">
	                <label for="descripcion">Descripcion:</label>
	                <input type="text" name="descripcion" class="form-control" value="'.$respuesta["descripcion"].'" required>
	              </div>

	              <br>

	              <div class="modal-footer">
	              <a href="index.php?action=catalogoGeneral">
	              	<button type="button" class="btn btn-danger pull-left">Cancelar</button>
	              </a>

                	<button type="submit" name="editar_catalogoP" class="btn btn-outline" style="background-color: #ff791e;">Guardar Cambios</button>
              		</div>
	              </div>
			';
		}


		# $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
		# CATALOGO SECUNDARIO O AUXILIAR
		# $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$


		#VISTA CATALOGOS PRINCIPALES
		public function vistaCatalogoSecundarioByPrincipal(){
			if(isset($_GET["id_CP"])){
				$datos = array("id_catalogo"=>$_GET["id_CP"]);
				$respuesta = BDCatalogo::getCatalogosSecundariosByPrincipal($datos);
				$cont = 1;
				foreach ($respuesta as $row => $item ) {
					echo '<tr>
							<td>'.$cont.'</td>
							<td>'.$item["nombre"].'</td>
							<td>'.$item["descripcion"].'</td>
							<td>
								<a href="index.php?action=editarCP&id_UCP='.$item["id"].'">
									<button class="btn btn-info" data-toggle="modal" data-target="#cpEditar"><i class="fa fa-info-circle"></i></button>
								</a>
							</td>
							<td>
								<a href="index.php?action=editarCS&id_UCS='.$item["id"].'">
									<button class="btn btn-info"><i class="fa fa-edit"></i></button>
								</a>
	      						<a href="index.php?action=catalogoSecundario&id_ECS='.$item["id"].'&id_CP='.$_GET["id_CP"].'">
									<button class="btn btn-danger"><i class="fa fa-times-circle"></i></button>
								</a>
							</td>
						</tr>';
					$cont += 1;
				}
			}
		}


		#REGISTRO DE CATALOGOS SECUNDARIOS
		public function registroCatalogoSecundario(){
			if (isset($_POST["registro_catalogoS"])) {
				$datosController = array("nombre"=>$_POST["nombre"],
										 "descripcion"=>$_POST["descripcion"],
										 "cantidad"=>$_POST["cantidad"],
										 "id_catalogo"=>$_POST["id_catalogo"]);
				$respuesta = BDCatalogo::registroCatalogoSecundario($datosController);
				if ($respuesta == "success") {
					echo '<script>
							window.location = "index.php?action=OK_CS&id_CP='.$_POST['id_catalogo'].'";
						  </script>';
				} else {
					echo '<script>
							window.location = "index.php?action=ERROR_CS";
						  </script>';
				}
				return $respuesta;
			}
		}


		#BORRAR CATALOGO SECUNDARIO
		public function eliminarCatalogoSecundario(){			
			if (isset($_GET["id_ECS"])) {
				$datos = $_GET["id_ECS"];
				var_dump($datos);
				$respuesta = BDCatalogo::borrarCatalogoSecundario($datos);
				if ($respuesta == "success") {
					echo '<script>
							window.location = "index.php?action=OK_ECS&id_CP='.$_GET["id_CP"].'";
						  </script>';
				}
			}
		}


		#EDITAR CATALOGO PRINCIPAL
		public function editarCatalogoSecundario(){
			$id = $_GET["id_UCS"];
			$respuesta = BDCatalogo::editarCatalogoSecundario($id);
			echo '
				  <div class="form-row p-1">
	                <label for="id">Clave Catalogo Pricipal:</label>
	                <input type="text" name="id_catalogo" class="form-control" value="'.$respuesta["id_catalogo"].'" readonly>
	              </div>
				  <div class="form-row p-1">
	                <label for="id">Clave:</label>
	                <input type="text" name="id" class="form-control" value="'.$respuesta["id"].'" readonly>
	              </div>
				  <div class="form-row p-1">
	                <label for="nombre">Nombre:</label>
	                <input type="text" name="nombre" class="form-control" value="'.$respuesta["nombre"].'" required>
	              </div>
	              <div class="form-row p-1">
	                <label for="descripcion">Descripcion:</label>
	                <input type="text" name="descripcion" class="form-control" value="'.$respuesta["descripcion"].'" required>
	              </div>
				  <div class="form-row p-1">
	                <label for="descripcion">Cantidad:</label>
	                <input type="text" name="cantidad" class="form-control" value="'.$respuesta["cantidad"].'" required>
	              </div>
	              <br>

	              <div class="modal-footer">
	              <a href="index.php?action=catalogoSecundario&id_CP='.$respuesta["id_catalogo"].'">
	              	<button type="button" class="btn btn-danger pull-left">Cancelar</button>
	              </a>

                	<button type="submit" name="editar_catalogoS" class="btn btn-outline" style="background-color: #ff791e;">Guardar Cambios</button>
              		</div>
	              </div>
			';
		}

		#ACTUALIZAR CATALOGO PRINCIPAL
		public function actualizarCatalogoSecundario(){
			if (isset($_POST["editar_catalogoS"])) {
				$datos = array("id"=>$_POST["id"],
					           "nombre"=>$_POST["nombre"],
					           "descripcion"=>$_POST["descripcion"],
					       	   "cantidad"=>$_POST['cantidad']);
				$respuesta = BDCatalogo::actualizarCatalogoSecundario($datos);
				if ($respuesta == "success") {
					echo '<script>
							window.location = "index.php?action=OK_UCS&id_CP='.$_POST['id_catalogo'].'";
						  </script>';
				}
			}
		}

	}
?>