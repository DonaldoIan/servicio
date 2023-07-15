<?= $cabecera?>

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
                                <th>ID Trabajador</th>
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
                                        <td><?= $lib['id_trabajador']; ?></td>
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

    <?= $modalusuario ?>

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
