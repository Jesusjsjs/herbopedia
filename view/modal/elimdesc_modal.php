<div class="modal fade" id="confirmarEliminarModal_<?php echo $data['IDD']?>" tabindex="-1" aria-labelledby="confirmarEliminarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="post" action="descubridores.php?m=confirmarDelete&id=<?php echo "0";?>" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmarEliminarModalLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    ¿Estás seguro de que quieres cambiar el estatus de  <strong><?php echo $data['nombre']?></strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="txt_es" value="<?php echo $data['estatus']; ?>">
                                        <input type="hidden" name="txt_id" value="<?php echo $data['IDD']; ?>">
                                        <input type="hidden" name="txt_path" value="<?php echo $data['nombre']; ?>">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger" value="eliminar">Cambiar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>