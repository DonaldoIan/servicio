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
                                        <a href="<?=base_url('editar/'.$lib['id']); ?>" class="btn btn-info" type="button">Editar</a>
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
