<?= $cabecera?>

    <center>
        <br>
        <br>
        <div class="card" style="width: 95%;">
            <div class="card-body">
                <h5 class="card-title">Tabla de Asistencias:</h5>
                <p class="card-text">
                    <div class="form-group">
                        <label for="buscar">Buscador</label>
                        <input id="buscar" class="form-control" type="text" name="buscar" placeholder="Buscar trabajador" style="width: 50%;">
                        <br>
                        <input type="button" name="imprimir" value="Imprimir P&aacute;gina" onclick="window.print();">
                        </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-primary display-5" href="<?=base_url('reporte');?>">Reportes</a></span>
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

    <?= $modalusuario ?>

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
