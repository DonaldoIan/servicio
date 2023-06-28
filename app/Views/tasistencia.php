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
            <a href="<?= base_url('menu'); ?>" class="navbar-brand" type="button">Menu</a>
            <a class="navbar-brand" href="#" onclick="ocultarFormulario()">Tabla de asistencias</a>
        </div>
    </nav><br>

    <center>
        <div class="card" style="width: 95%;">
            <div class="card-body">
                <h5 class="card-title">Tabla de Asistencias:</h5>
                <p class="card-text">
                    <div class="form-group">
                        <label for="buscar">Buscador</label>
                        <input id="buscar" class="form-control" type="text" name="buscar" placeholder="Buscar trabajador" style="width: 50%;">
                    </div>
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Trabajador</th>
                                <th>Sede de trabajador</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Huella</th>
                            </tr>
                        </thead>
                        <tbody id="tablaAsistencias">
                            <?php if (!empty($asistencias)): ?>
                                <?php foreach ($asistencias as $lib): ?>
                                    <tr>
                                        <td><?= $lib['id_trabajador']; ?></td>
                                        <td><?= $lib['id_sede']; ?></td>
                                        <td><?= $lib['fecha']; ?></td>
                                        <td><?= $lib['hora']; ?></td>
                                        <td><?= $lib['id_huella']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </p>
            </div>
        </div>
    </center>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Filtrar la tabla al ingresar texto en el buscador
            $('#buscar').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#tablaAsistencias tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            <?php if(session('mensaje')){ ?>
                $('#mensajeModal').modal('show');
            <?php } ?>
        });
    </script>

</body>

</html>
