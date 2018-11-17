<?php 
    $registro = new CatalogosController();
    $registro->registroCatalogoSecundario();
    $registro->eliminarCatalogoSecundario();

    if (isset($_GET["action"])) {
      if ($_GET["action"] == "OK_CS") {
        ?>
          <script type="text/javascript">
            swal({
              type: "success",
              title: "Exito al Registrar",
              confirmButtonText: "OK"
            });
          </script>
        <?php
      }
      if ($_GET["action"] == "OK_ECS") {
        ?>
          <script type="text/javascript">
            swal({
              type: "success",
              title: "Exito al Eliminar",
              confirmButtonText: "OK"
            });
          </script>
        <?php
      }
      if ($_GET["action"] == "OK_UCS") {
        ?>
          <script type="text/javascript">
            swal({
              type: "success",
              title: "Exito al Modificar",
              confirmButtonText: "OK"
            });
          </script>
        <?php
      }
    }
?>


<section class="content-header">

  <h1>
    Catalogos Secundarios
    <small>Control Catalogos Secundarios</small>
  </h1>

  <ol class="breadcrumb">
    <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li><a href="index.php?action=catalogoGeneral">Catalogos Generales</a></li>
    <li class="active">Catalogos Secundarios</li>
  </ol>

</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="col-md-12">
    <div class="box box-danger">

      <div class="box-header with-border">
        <h3 class="box-title">Catalogos Secundarios</h3>
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
        <!-- VISTA PRINCIPAL CATALOGO SECUNDARIO -->

        <div class="pull-right box-tools">
          <a href="index.php?action=catalogoGeneral">
            <button class="btn btn-info"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Regresar</button>
          </a>
          <button type="button" class="m-2 btn btn-success" data-toggle="modal" data-target="#cpRegistro">
            <i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar
          </button>
      </div>

      <br><br>

        <table class="table table-bordered text-center">
            <thead class="thead-inverse" style="background-color: #ff791e;">
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Detalles</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php 
                    $vista = new CatalogosController();
                    $vista->vistaCatalogoSecundarioByPrincipal();
                ?>
            </tbody>
            <tfoot>
                <tr>
                  <td colspan="5">
                    <a href="index.php?action=catalogoGeneral">
                      <button class="btn btn-info"><i class="fa fa-retweet"></i></button>
                    </a>
                  </td>
                </tr>
            </tfoot>
      </table>

      </div>
      <!-- /.box-body -->

           <!-- VENTANA MODAL PARA REGISTRO DE CATALOGO PRINCIPAL -->


      <div class="modal modal-success fade" id="cpRegistro">
          <div class="modal-dialog modal-dialog-centered">
          <form class="p-1" method="POST">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registro Catalogo Secundario</h4>
              </div>
                <div class="modal-body">

                  <div class="form-row p-1">
                    <label for="nombre">Clave Catalogo Principal:</label>
                    <input type="text" name="id_catalogo" class="form-control" value="<?=$_GET["id_CP"]?>" readonly>
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
                    <label for="descripcion">Cantidad:</label>
                    <input type="number" name="cantidad" class="form-control" required>
                  </div>

                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" style="background-color: #C42420;">Cancelar</button>
                <button type="submit" name="registro_catalogoS" class="btn btn-outline text-light" style="background-color: #ff791e;">Registrar</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

    </div>
  </div>

</section>