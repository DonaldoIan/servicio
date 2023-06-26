<!DOCTYPE html>
<html>
<head>
  <title>Menú</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      <a class="navbar-brand" href="<?=base_url('menu');?>">Menú</a>
    </div>
  </nav>

  <!-- Contenido de la página -->
  <div class="container">
      <div class="row row-cols-8">
          <div class="col">
            <div class="container">
              <!--eliminar con margin top (en proceso)-->
              <br>
              <br><br><br>
              <!---->
              <!--div principal de opciones a elegir (fondo)-->
              <div id="opciones">
                <div class="row justify-content-center">
                  <!--Titulo de esta sección "hola administrador"-->
                  <div class="col-8" style="margin-top: 10%;">
                    <h2 id="sub_hola">¡Hola, administrador!</h2>
                  </div>
                </div>

                <!--eliminar a futuro-->
                <br>
                <!---->

                <!--subtitulo "que va a hacer hoy"-->
                <div class="row justify-content-center">
                  <div class="col-8">
                    <h4 id="subsub_hola">¿Qué va hacer hoy?</h4>
                  </div>
                </div>

                <!--eliminar a futuro-->
                <br>
                <br>
                <!---->
  
                <!--primera sección de filas-->
                <div class="row justify-content-around">
                  <!--agregar al banco-->
                  <a href="<?= base_url('tasistencia');?>" class="nav-link btn btn-primary" type="button" style="margin-right: 5px;">Tabla de asistencias</a><br>
                  <!--visualizar avances-->
                  <a href="<?= base_url('tusuarios');?>" class="nav-link btn btn-primary" type="button" style="margin-right: 5px;">Usuarios registrados</a>
                </div>
                <!--eliminar a futuro-->
                <br>
                <!---->

                <!--segunda sección de filas-->
                <div class="row justify-content-around">
                  <!--crear evaluación-->
                  <button class="nav-link btn btn-primary" data-toggle="modal" data-target="#modalParaEditar">Registrar Trabajadores</button><br>
                  <!--gestionar estudiantes-->
                  <button class="nav-link btn btn-primary" data-toggle="modal" data-target="#modalParaAsistencias">Tomar asistencia</button>
                </div>
                <!--eliminar a futuro-->
                <br>
                 
                
              </div>
            </div>
          </div>
        <!--imagen de logo principal en pantalla-->
        <div class="col">
          <a style="display: flex; justify-content: center; margin-top: 10%;"><img src="<?=base_url()?>public/img/logo.png" alt=""></a>
        </div>
      </div>
    </div>
  </main>

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
              <button class="btn btn-info" type="submit" onclick="return mostrarAlerta()">Guardar</button>

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
                          <a href="<?= base_url('huella/' . $lib['id']); ?>" class="btn btn-info" type="button">Tomar asistencia</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
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


  function mostrarAlerta() {
    alerta().then(function(result) {
      if (result.isConfirmed) {
        // Enviar los datos al controlador
        document.getElementById("formulario").submit();
      }
    });

    return false; // Evitar el envío automático del formulario
  }

  function alerta() {
    return Swal.fire({
      title: 'Trabajador agregado',
      icon: 'success',
      showCancelButton: false,
      confirmButtonText: 'Aceptar'
    });
  }






  </script>
</body>
</html>
