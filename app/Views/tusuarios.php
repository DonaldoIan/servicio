<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.7.12, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?=base_url('/public/img/assets');?>/images/imagen5-1.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Usuarios Registrados</title>
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

    <br>
    <br>
    <center>
        <div class="card" style="width: 95%;">
            <div class="card-body">
                <h5 class="card-title">Usuarios Registrados:</h5>
                <p class="card-text">
                    <div class="form-group">
                        <label for="buscar">Buscar trabajador</label>
                        <input id="buscar" class="form-control" type="text" name="buscar" placeholder="Buscar trabajador" style="width: 50%;">
                    </div>
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Trabajador</th>
                                <th>Puesto</th>
                                <th>Sede</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaUsuarios">
                            <?php if ($trabajadores && $sede): ?>
                                <?php foreach ($trabajadores as $index => $lib): ?>
                                    <tr>
                                        <td><?= $lib['nombre']; ?> <?= $lib['apellido_pat']; ?> <?= $lib['apellido_mat']; ?></td>
                                        <td><?= $lib['puesto']; ?></td>
                                        <td><?= $sede[$index]['sede']; ?></td>
                                        <td>
                                            <a href="<?= base_url('editar/'.$lib['id']); ?>" class="btn btn-info" type="button">Editar</a>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalParaBorrar<?= $lib['id']; ?>" style="margin-top: 5px;">Borrar</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </p>
            </div>
        </div>
    </center>

    <!-- Modales para borrar -->
    <?php if ($trabajadores && $sede): ?>
        <?php foreach ($trabajadores as $index => $lib): ?>
            <div class="modal fade" id="modalParaBorrar<?= $lib['id']; ?>" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Mensaje</h5>
                        </div>
                        <div class="modal-body">
                            <h6>¿Seguro que deseas borrar el usuario: <?= $lib['nombre']; ?> <?= $lib['apellido_pat']; ?> <?= $lib['apellido_mat']; ?>?</h6>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <a href="<?= base_url('borrar/' . $lib['id']); ?>" class="btn btn-danger" type="button" style="margin-top: 5px;">Borrar</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

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
    <?php } ?>

    <br>
    <?php if(session('borrar')){?>
        <div class="modal fade" id="borrar" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mensaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= session('borrar');?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            <?php if(session('mensaje')){?>
            $('#mensajeModal').modal('show');
            <?php } ?>
        });
    </script>
    <script>
        $(document).ready(function() {
            <?php if(session('borrar')){?>
            $('#borrar').modal('show');
            <?php } ?>
        });

        // Función para filtrar la tabla en tiempo real
        $('#buscar').on('input', function() {
            var searchText = $(this).val().toLowerCase();
            $('#tablaUsuarios tr').each(function() {
                var trabajador = $(this).find('td:first').text().toLowerCase();
                if (trabajador.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    </script>

</body>

</html>
