     <!-- Modal para confirmar eliminación de registro-->
     <div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4> </div>
                    <div class="modal-body"> ¿Desea eliminar este registro? </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> <a class="btn btn-danger btn-ok">Eliminar</a> </div>
                    </div>
                </div>
            </div>
            <script>
                $('#confirm_delete').on('show.bs.modal', function (e) {
                    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                });
            </script> 
