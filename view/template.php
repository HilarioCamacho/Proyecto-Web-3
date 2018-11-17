<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Truper</title>

		<!-- <link rel="stylesheet" href="css/style.css"> -->

	  <!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="view/bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="view/bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Ionicons -->
  	<link rel="stylesheet" href="view/bower_components/Ionicons/css/ionicons.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="view/dist/css/AdminLTE.min.css">
  	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="view/dist/css/skins/_all-skins.min.css">

	<!--

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	-->

	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  	<!-- jQuery 3 -->
	<script src="view/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="view/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="view/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="view/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="view/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="view/dist/js/demo.js"></script>

	<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	<script src="sweetalert2/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
	
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

	<?php
		$controller = new Controller();
		$catalogosController =  new CatalogosController();
	?>

	<div class="wrapper">
		<?php
			$controller->getNavbar();
			$controller->getSide();
		?>
		<!--  ============  TEMPLATES  ============  -->
		<div class="content-wrapper">
			<?php
				$controller->getTemplates();
				//$controller->getProfile();
			?>
		</div>
		<!--  ============  End TEMPLATES  ============  -->
		<?php
				$controller->getFooter();
		?>
	</div>


	<script>
	  $(document).ready(function () {
	    $('.sidebar-menu').tree();
	  })
	</script>

</body>

	<!--
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	-->

	<script type="text/javascript" src="js/auth0_loggin.js"></script>
	<script type="text/javascript" src="node_modules/auth0-js/build/auth0.js"></script>

	<script type="text/javascript" src="js/catalogosJS.js"></script>
	<!--<script src="js/plantilla.js"></script>-->

</html>