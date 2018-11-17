<section class="content-header">

  <h1>
    Editar Catalogo Secundario
    <small>Modificar un catalogo Secundario</small>
  </h1>

  <ol class="breadcrumb">
    <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li><a href="index.php?action=catalogoGeneral">Catalogos Secundarios</a></li>
    <li class="active">Editar Catalogo Secundario</li>
  </ol>

</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="col-md-6">
	  <div class="box box-danger">

	    <div class="box-header with-border">
	      <h3 class="box-title">Editar Catalogo Secundario</h3>
	      <div class="box-tools pull-right">
	        <button class="btn btn-box-tool" type="button" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	          <i class="fa fa-minus"></i>
	        </button>
	        <button class="btn btn-box-tool" type="button" data-widget="remove" data-toggle="tooltip" title="Remove">
	          <i class="fa fa-times"></i>
	        </button>
	      </div>
	    </div>

	    <div class="box-body">
	      <!-- VISTA PRINCIPAL Editar Catalogo General -->
	      
	      <form method="POST">
	      	<?php
	      		$registro = new CatalogosController();
	      		$registro->actualizarCatalogoSecundario();
	      		$registro->editarCatalogoSecundario();
	      	?>
	      </form>

	    </div>
	    <!-- /.box-body -->

	  </div>
	</div>

</section>