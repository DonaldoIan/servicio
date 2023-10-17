<!-- Modal para agregar un nuevo administrador -->
<br>
<?php if (session('mensaje')) { ?>
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
    <script>
        $(document).ready(function() {
            $('#mensajeModal').modal('show');
        });
    </script>
<?php } ?>

<div class="modal fade" id="modalParaEditar" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar administradores</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= site_url('/guardarsu'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="clave">Clave de Trabajador:</label>
                        <input id="clave" value="<?= old('nombre') ?>" class="form-control" type="text" name="clave"
                            placeholder="Clave de Trabajador.">
                    </div>
                    <div class="form-group">
                        <label for="gmail">Gmail</label>
                        <input id="gmail" value="<?= old('paterno') ?>" class="form-control" type="text" name="gmail"
                            placeholder="Gmail">
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña</label>
                        <input id="contraseña" value="<?= old('materno') ?>" class="form-control" type="text" name="contraseña"
                            placeholder="Contraseña">
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
                        <button class="btn btn-info ml-auto" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function ocultarFormulario() {
        $('#modalParaEditar').modal('hide');
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
