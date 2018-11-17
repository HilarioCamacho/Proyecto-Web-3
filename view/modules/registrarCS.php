<style type="text/css">
    .box {
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        border-top: 3px solid #d2d6de;
        margin-bottom: 20px;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    }
    .box.box-truper {
        border-top-color: #ff791e;
    }
</style>
<div class="row pt-3" style="width: 98%;">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="box box-danger p-2">
			<form method="POST">
				<legend class="text-dark pb-2" style="border-bottom: 2px solid #ff791e;">Registrar Catalogo Secundario</legend>
				<div class="form-row p-1">
                	<label for="nombre">Clave del Catalogo:</label>
                	<input type="text" name="id_catalogo" class="form-control" value="<?=$_GET['id_CP']?>" readonly>
              	</div>
              	<div class="form-row p-1">
                	<label for="nombre">Nombre:</label>
                	<input type="text" name="nombre" class="form-control" required>
              	</div>
              	<div class="form-row p-1">
                	<label for="descripcion">Descripcion:</label>
                	<input type="text" name="descripcion" class="form-control" required>
              	</div>
              	<div class="form-row p-1">
                	<label for="cantidad">Cantidad:</label>
                	<input type="text" name="cantidad" class="form-control" required>
              	</div>
			</form>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>