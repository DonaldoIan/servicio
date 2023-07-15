
<!-- Modal para agregar un nuevo trabajador -->
<br>
  <?php if(session('mensaje')){?>
  <div class="modal fade" id="mensajeModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mensaje</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= session('mensaje');?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#mensajeModal').modal('show');
    });
  </script>
  <?php } ?>

  <div class="modal fade" id="modalParaEditar" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= site_url('/guardar'); ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nombre">Nombre(s):</label>
              <input id="nombre" value="<?= old('nombre') ?>" class="form-control" type="text" name="nombre" placeholder="Nombre(s).">
            </div>
            <div class="form-group">
              <label for="paterno">Apellido Paterno:</label>
              <input id="paterno" value="<?= old('paterno') ?>" class="form-control" type="text" name="paterno" placeholder="Apellido Paterno.">
            </div>
            <div class="form-group">
              <label for="materno">Apellido Materno:</label>
              <input id="materno" value="<?= old('materno') ?>" class="form-control" type="text" name="materno" placeholder="Apellido Materno.">
            </div>
            <div class="form-group">
              <label for="trabajador">ID del trabajador:</label>
              <input id="trabajador" value="<?= old('trabajador') ?>" class="form-control" type="text" name="trabajador" placeholder="ID Trabajador .">
            </div>
            <div class="form-group">
              <label for="tema">Puesto:</label>
              <select id="tema" class="form-control" name="tema">
                <option>Docente</option>
                <option>Técnico Académico</option>
                <option>Administrativo</option>
                <option>Intendencia</option>
                <option>Mantenimiento</option>
              </select>
            </div>
            <div class="form-group">
              <label for="sede">Sede:</label>
              <select id="sede" class="form-control" name="sede">
                <option>San José Chiapa</option>
                <option>Ciudad Serdán</option>
                <option>El Seco</option>
                <option>Tepeaca</option>
                <option>Acajete</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button class="btn btn-info" type="submit">Guardar</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script>
    function ocultarFormulario() {
      $('#modalParaEditar').modal('hide');
      refrescarPagina();
    }

    function refrescarPagina() {
      location.reload();
      setTimeout(function() {
        alerta();
      }, 1000); // Esperar 1 segundo después de recargar la página para mostrar la alerta
    }

    $(document).ready(function() {
      $('#buscar').on('input', function() {
        var input = $(this).val().toLowerCase();
        $('#tablaUsuarios tr').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(input) > -1)
        });
      });
    });

  </script>