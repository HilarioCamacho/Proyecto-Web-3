<section class="content-header">

  <h1>
    Registro de Productos
    <small>Registrar Nuevos Productos</small>
  </h1>

  <ol class="breadcrumb">
    <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li class="active">Registro de Productos</li>
  </ol>

</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box box-danger">

    <div class="box-header with-border">
      <h3 class="box-title">Registro de Productos</h3>
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
      <!-- VISTA Registro de Productos -->

      <form>
      	<div class="p-1 mb-3">
			<div class="input-group">
			  <span class="input-group-addon btn-outline" style="background-color: #151414" id="sizing-addon2">Nombre</span>
			  <input type="text" class="form-control" placeholder="Nombre del Producto" aria-describedby="sizing-addon2" required>
			</div>
		</div>
		<div class="p-1 mb-3">
			<div class="input-group">
				<div class="input-group-addon bg-navy">
					<span class="input-group-text text-light">Materia 2&nbsp;&nbsp;&nbsp;</span>
				</div>
				<input type="number" class="form-control" name="mate" step=".1" min="0" max="100" required>
			</div>
		</div>
		<div class="p-1 mb-3">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="input-group-text bg-dark text-light">Materia 3&nbsp;&nbsp;&nbsp;</span>
				</div>
				<input type="number" class="form-control" name="geo" step=".1" min="0" max="100" required>
			</div>
		</div>
		<hr class="bg-success">
		<div class="form-row">
			<input type="submit" class="btn btn-success pl-5 pr-5 col-md-6" name="promedio" value="Calcular Promedio Escolar">
		</div>
	    



      </form>

    </div>
    <!-- /.box-body -->

  </div>

</section>

