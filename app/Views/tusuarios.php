<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de asistencias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="<?= base_url('menu');?>" class="navbar-brand" type="button">Menu</a>
        <a class="navbar-brand" href="#" onclick="ocultarFormulario()">Tabla de asistencias</a>
    </div>
</nav><br>

<br>
<center>
    <div class="card" style="width: 95%;">
        <div class="card-body">
            <h5 class="card-title">Trabajadores Registrados:</h5>
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
                                        <button href="<?= base_url('borrar/' . $lib['id']); ?>" class="nav-link btn btn-primary" data-toggle="modal" data-target="#modalParaEditar" style="margin-top: 5px;">Editar</button>
                                        <a href="<?= base_url('borrar/' . $lib['id']); ?>" class="btn btn-danger" type="button" style="margin-top: 5px;">Borrar</a>
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
                        <input id="buscarModal" class="form-control" type="text" name="buscar" placeholder="Buscar trabajador">
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
                            <tbody id="tablaUsuariosModal">
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
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal para editar un nuevo trabajador -->
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
                        <input id="nombre" value="<?= isset($trabajadorSeleccionado) ? $trabajadorSeleccionado['nombre'] : '' ?>" class="form-control" type="text" name="nombre" placeholder="Nombre(s).">
                    </div>
                    <div class="form-group">
                        <label for="paterno">Apellido Paterno:</label>
                        <input id="paterno" value="<?= isset($trabajadorSeleccionado) ? $trabajadorSeleccionado['apellido_pat'] : '' ?>" class="form-control" type="text" name="paterno" placeholder="Apellido Paterno.">
                    </div>
                    <div class="form-group">
                        <label for="materno">Apellido Materno:</label>
                        <input id="materno" value="<?= isset($trabajadorSeleccionado) ? $trabajadorSeleccionado['apellido_mat'] : '' ?>" class="form-control" type="text" name="materno" placeholder="Apellido Materno.">
                    </div>
                    <div class="form-group">
                        <label for="tema">Puesto:</label>
                        <select id="tema" class="form-control" name="tema">
                            <option <?= (isset($trabajadorSeleccionado) && $trabajadorSeleccionado['puesto'] == 'Docente') ? 'selected' : '' ?>>Docente</option>
                            <option <?= (isset($trabajadorSeleccionado) && $trabajadorSeleccionado['puesto'] == 'Técnico Académico') ? 'selected' : '' ?>>Técnico Académico</option>
                            <option <?= (isset($trabajadorSeleccionado) && $trabajadorSeleccionado['puesto'] == 'Administrativo') ? 'selected' : '' ?>>Administrativo</option>
                            <option <?= (isset($trabajadorSeleccionado) && $trabajadorSeleccionado['puesto'] == 'Intendencia') ? 'selected' : '' ?>>Intendencia</option>
                            <option <?= (isset($trabajadorSeleccionado) && $trabajadorSeleccionado['puesto'] == 'Mantenimiento') ? 'selected' : '' ?>>Mantenimiento</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sede">Sede:</label>
                        <select id="sede" class="form-control" name="sede">
                            <option <?= (isset($trabajadorSeleccionado) && $trabajadorSeleccionado['sede'] == 'San José Chiapa') ? 'selected' : '' ?>>San José Chiapa</option>
                            <option <?= (isset($trabajadorSeleccionado) && $trabajadorSeleccionado['sede'] == 'Ciudad Serdán') ? 'selected' : '' ?>>Ciudad Serdán</option>
                            <option <?= (isset($trabajadorSeleccionado) && $trabajadorSeleccionado['sede'] == 'El Seco') ? 'selected' : '' ?>>El Seco</option>
                            <option <?= (isset($trabajadorSeleccionado) && $trabajadorSeleccionado['sede'] == 'Tepeaca') ? 'selected' : '' ?>>Tepeaca</option>
                            <option <?= (isset($trabajadorSeleccionado) && $trabajadorSeleccionado['sede'] == 'Acajete') ? 'selected' : '' ?>>Acajete</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-info" type="submit" onclick="ocultarFormulario()">Actualizar</button>
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
                $(this).toggle($(this).text().toLowerCase().indexOf(input) > -1);
            });
        });

        $('#buscarModal').on('input', function() {
            var input = $(this).val().toLowerCase();
            $('#tablaUsuariosModal tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(input) > -1);
            });
        });
    });
</script>
</body>
</html>
