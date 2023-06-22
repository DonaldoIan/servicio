<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de asistencias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .input-width-50 {
            width: 50%;
        }
    </style>
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
    <h3>Trabajadores Registrados:</h3>
    <div class="form-group">
    <label for="buscar">Buscar trabajador</label>
    <form action="<?= base_url('filtrarTrabajadores'); ?>" method="get">
        <input id="buscar" value="<?= old('buscar') ?>" class="form-control input-width-50" type="text" name="buscar" placeholder="Buscar trabajador">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

</center>

<?php if ($trabajadores && $sede): ?>
    <?php foreach ($trabajadores as $index => $lib): ?>
        <?php
        $nombreCompleto = $lib['nombre'] . ' ' . $lib['apellido_pat'] . ' ' . $lib['apellido_mat'];
        $puesto = $lib['puesto'];
        $sedeTrabajador = $sede[$index]['sede'];
        ?>
        <section class="container right-align">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Trabajador: <?= $lib['nombre']; ?></h5>
                    <p class="card-text">
                        <p><strong>Nombre completo:</strong> <?= $nombreCompleto; ?></p>
                        <p><strong>Puesto:</strong> <?= $puesto; ?></p>
                        <p><strong>Sede:</strong> <?= $sedeTrabajador; ?></p>
                        <a href="<?= base_url('borrar/' . $lib['id']); ?>" class="btn btn-danger" type="button">Borrar</a>
                    </div>
                </div>
            </section>
            <br>
        <?php endforeach; ?>
<?php endif; ?>


</body>
</html>
