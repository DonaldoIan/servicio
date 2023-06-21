<!DOCTYPE html>
<html>
<head>
  <title>Menú</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .navbar {
      justify-content: flex-start;
    }

    .navbar-nav {
      margin-left: auto;
    }
    .container {
      display: flex;
      justify-content: flex-start;
    }

    .right-align {
      margin-left: auto;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#" onclick="ocultarFormulario()">Menú</a>
      <button class="nav-link btn btn-primary" data-toggle="modal" data-target="#modalParaEditar">Registrar Trabajadores</button>
      <button class="nav-link btn btn-primary" data-toggle="modal" data-target="#modalParaAsistencias">Tomar asistencia</button>
    </div>
  </nav>

  <!-- Contenido de la página -->
  <br>
  <center><h3>Trabajadores Registrados:</h3></center>

  <?php if (!empty($trabajadores)): ?>
    <?php foreach ($trabajadores as $lib): ?>
      <section class="container right-align">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title">Trabajador: <?= $lib['nombre']; ?></h5>
            <p class="card-text">
              <p>Puesto: <?= $lib['puesto']; ?></p>
              <p>Nombre completo: <?= $lib['nombre']; ?> <?= $lib['apellido_pat']; ?> <?= $lib['apellido_mat']; ?></p>
              <p>Huella: Registrada</p>
              <p></p>
            </div>
          </div>
      </section>
      <br>
    <?php endforeach; ?>
  <?php endif; ?>

  <!-- Modal para agregar un nuevo trabajador -->
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
              <label for="tema">Tema:</label>
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
                <option>Docente</option>
                <option>Técnico Académico</option>
                <option>Administrativo</option>
                <option>Intendencia</option>
                <option>Mantenimiento</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button class="btn btn-info" type="submit" onclick="ocultarFormulario()">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal para tomar asistencia -->
  <div class="modal fade" id="modalParaAsistencias" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Asistencias</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= site_url('/guardarAsistencia'); ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="buscar">Buscar trabajador</label>
              <input id="buscar" value="<?= old('buscar') ?>" class="form-control" type="text" name="buscar" placeholder="Buscar trabajador">
            </div>
            <div class="container">
              <table class="table table-light">
                <thead class="thead-light">
                  <tr>
                    <th>Trabajador</th>
                    <th>Puesto</th>
                    <th>Asistencia</th>
                  </tr>
                </thead>
                <tbody id="tablaUsuarios">
                  <?php if (!empty($trabajadores)): ?>
                    <?php foreach ($trabajadores as $lib): ?>
                      <tr>
                        <td><?= $lib['nombre']; ?> <?= $lib['apellido_pat']; ?></td>
                        <td><?= $lib['puesto']; ?></td>
                        <td>
                          <a href="<?= base_url('asistencia/' . $lib['id']); ?>" class="btn btn-info" type="button">Tomar asistencia</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function ocultarFormulario() {
      $('#modalParaEditar').modal('hide');
      refrescarPagina();
    }

    function refrescarPagina() {
      location.reload();
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
</body>
</html>
