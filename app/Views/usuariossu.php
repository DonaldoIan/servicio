<?= $cabecerasuperu?>

<br>
<br>
<div class="container" style="width: 80%;">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Usuarios Registrados:</h5>
            <p class="card-text">
                <div class="form-group">
                    <label for="buscar">Buscar trabajador</label>
                    <input id="buscar" class="form-control" type="text" name="buscar" placeholder="Buscar trabajador" style="width: 50%;">

                    <br>
                    <span class="navbar-caption-wrap">
                        <a class="navbar-caption text-primary display-5" href="<?= base_url('reporte_usuario'); ?>"
                            style="display: inline-block; padding: 5px 10px; background-color: #fff; color: #000 !important; border: 1px solid #000; text-decoration: none; transition: opacity 0.3s;"
                            onmouseover="this.style.opacity=0.7" onmouseout="this.style.opacity=1">Reportes Usuario</a>
                    </span>
                </div>
                <table class="table table-light" style="margin: 0 auto;">
                    <thead class="thead-light">
                        <tr>
                            <th>Clave del trabajador</th>
                            <th>Gmail</th>
                            <th>Sede</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaUsuarios">
                        <?php if ($admin): ?>
                            <?php foreach ($admin as $lib): ?>
                                <tr>
                                    <td><?= $lib['claveusuario']; ?></td>
                                    <td><?= $lib['usuario']; ?></td>
                                    <td><?= $lib['sede']; ?></td>
                                    <td>
                                        <a href="<?= base_url('editar/'.$lib['id']); ?>"
                                            class="btn btn-info" type="button">Editar</a>
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#modalParaBorrar<?= $lib['id']; ?>" style="margin-top: 5px;">Borrar</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </p>
        </div>
    </div>
</div>

<!-- Modales para borrar -->
<?php if ($admin): ?>
    <?php foreach ($admin as $lib): ?>
        <div class="modal fade" id="modalParaBorrar<?= $lib['id']; ?>" data-backdrop="static"
            data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mensaje</h5>
                    </div>
                    <div class="modal-body">
                        <h6>¿Seguro que deseas borrar el usuario: <?= $lib['usuario']; ?></h6>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a href="<?= base_url('borrar/' . $lib['id']); ?>" class="btn btn-danger" type="button"
                            style="margin-top: 5px;">Borrar</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<br>
<?php if(session('mensaje')): ?>
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
                    <?= session('mensaje'); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<br>
<?php if(session('borrar')): ?>
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
                    <?= session('borrar'); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $modaladmin ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        <?php if(session('mensaje')): ?>
        $('#mensajeModal').modal('show');
        <?php endif; ?>
    });
</script>
<script>
    $(document).ready(function() {
        <?php if(session('borrar')): ?>
        $('#borrar').modal('show');
        <?php endif; ?>
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
