<?php 
	class Navegacion {

		#ENLAZAR A ...

		public function enlazarA($e) {
			if ($e == "catalogo_productos" or
				$e == "usuarios" or
				$e == "producto_registro" or
				$e == "productos" or
				$e == "editar" or
				$e == "editar_producto" or
				$e == "salir" or 
				$e == "catalogoGeneral" or
				$e == "editarCP" or
				$e == "catalogoSecundario" or
				$e == "registrarCS" or
				$e == "editarCS") {

				$module  = "view/modules/".$e.".php";
			} else if ($e == "index") {
				$module = "view/modules/catalogo_productos.php";
			} else if ($e == "OK") {
				$module = "view/modules/catalogo_productos.php";
			} else if ($e == "fallo") {
				$module = "view/modules/catalogo_productos.php";
			} else if ($e == "falloProd") {
				$module = "view/modules/catalogo_productos.php";
			} else if ($e == "cambio") {
				$module = "view/modules/catalogo_productos.php";
			#OPCIONES CATALOGO PRINCIPAL
			}else if ($e == "OK_CP" or $e == "ERROR_CP" or $e == "OK_ECP" or $e == "OK_UCP") {
				$module = "view/modules/catalogoGeneral.php";
			}else if ($e == "OK_CS" or $e == "ERROR_CS" or $e == "OK_ECS" or $e == "OK_UCS") {
				$module = "view/modules/catalogoSecundario.php";
			}
			#------------------------------------------------
			else {
				$module = "view/modules/catalogo_productos.php";
			}
			return $module;
		}
	}
?>