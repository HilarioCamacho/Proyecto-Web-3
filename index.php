<?php 
	# Controllers
	require_once "controller/controller.php";
	require_once "controller/catalogosController.php";

	#Navegacion
	require_once "model/navegacion.php";

	#CRUDS
	require_once "model/BDCatalogo.php";

	$controller = new Controller();
	#$catalogosController =  new CatalogosController();
	$controller->getTemplate();