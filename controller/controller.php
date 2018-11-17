<?php 
	class Controller {

		#LLAMADA A TEMPLATE - PLANTILLA PRINCIPAL
		
		public function getTemplate() {
			include "view/template.php";
		}

		#LLAMADA NAVBAR
		
		public function getNavbar() {
			include "view/modules/navbar.php";
		}

		#LLAMADA FOOTER
		
		public function getFooter() {
			include "view/modules/footer.php";
		}

		#LLAMADA SIDE
		
		public function getSide() {
			include "view/modules/side.php";
		}

		#LLAMADA PORFILE
		
		public function getProfile() {
			include "view/modules/profile.php";
		}

		#TEMPLATES - ENLACES

		public function getTemplates() {
			if (isset($_GET["action"])) {
				$enlaces = $_GET["action"];
			} else {
				$enlaces = $_GET["index"];
			}

			$respuesta = Navegacion::enlazarA($enlaces);
			include $respuesta;
		}
	}
?>