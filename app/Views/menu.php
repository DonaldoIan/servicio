<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.7.12, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?=base_url('/public/img/assets');?>/images/imagen5-1.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Home</title>
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/dropdown/css/style.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="<?=base_url('/public/img/assets');?>/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/mobirise/css/mbr-additional.css" type="text/css">

  
  
  
</head>
<body>
  
  <section data-bs-version="5.1" class="menu cid-tHSxImlL10" once="menu" id="menu1-3">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.html">
                        <img src="<?=base_url('/public/img/assets');?>/images/imagen5-1.png" alt="" style="height: 4.4rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-primary display-5" href="index.html#top">BUAP</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-primary display-4"  data-toggle="modal" data-target="#modalParaEditar"> <span class="mbrib-contact-form mbr-iconfont mbr-iconfont-btn"></span>Registrar Trabajadores</a></li><li class="nav-item"><a class="nav-link link text-primary display-4" href="<?= base_url('tusuarios');?>" aria-expanded="false"><span class="mobi-mbri mobi-mbri-users mbr-iconfont mbr-iconfont-btn"></span>Usuarios Registrados</a></li><li class="nav-item"><a class="nav-link link text-primary display-4" data-toggle="modal" data-target="#modalParaAsistencias"><span class="mobi-mbri mobi-mbri-contact-form mbr-iconfont mbr-iconfont-btn"></span>Tomar Asistencia</a></li><li class="nav-item"><a class="nav-link link text-primary display-4" href="<?= base_url('tasistencia');?>" aria-expanded="false"><span class="mobi-mbri mobi-mbri-bulleted-list mbr-iconfont mbr-iconfont-btn"></span>Tabla de Asistencias</a></li></ul>

                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-success display-4" href="index.html"><span class="mobi-mbri mobi-mbri-logout mbr-iconfont mbr-iconfont-btn"></span>Cerrar Sesión</a></div>
            </div>
        </div>
    </nav>

</section>


<section data-bs-version="5.1" class="header10 cid-tIOWxVISMG mbr-fullscreen" id="header10-7">


    <div class="align-center container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-9">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-1"><strong>¡BIENVENIDO ADMINISTRADOR!</strong></h1>
                <p class="mbr-text mbr-fonts-style display-5">Recuerda que todas las herramientas de trabajo se encuentran disponibles en el menú de la parte superior.</p>
                <div class="mbr-section-btn mt-3"><a class="btn btn-success display-4" href="index.html">Tutorial de Uso</a></div>
                <div class="image-wrap mt-4">
                    <img src="<?=base_url('/public/img/assets');?>/images/logo-de-la-buap.svg-3-600x600.png" alt="" title="">
                </div>
            </div>
        </div>
    </div>
</section><script src="<?=base_url('/public/img/assets');?>/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="<?=base_url('/public/img/assets');?>/smoothscroll/smooth-scroll.js"></script>  <script src="<?=base_url('/public/img/assets');?>/ytplayer/index.js"></script>  <script src="<?=base_url('/public/img/assets');?>/dropdown/js/navbar-dropdown.js"></script>  <script src="<?=base_url('/public/img/assets');?>/theme/js/script.js"></script>  
  
  




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

  <!-- Modal para tomar asistencia -->
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

  </script>















</body>
</html>