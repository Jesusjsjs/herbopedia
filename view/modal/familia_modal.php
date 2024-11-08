<div class="modal fade" id="familiasModal<?php echo $data['IDF']?>" tabindex="-1"
                        aria-labelledby="descubridoresModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="descubridoresModalLabel">Editar Familia de plantas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="familias.php?m=get_datosE" method="post"  enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="nombreDescubridor" class="form-label">Nombre de la familia</label>
                                            <input type="text" class="form-control" id="nombreFamilia" name="txt_nom" required value="<?php echo $data['nombrefam']?>">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="txt_id" value="<?php echo $data['IDF']?>">
                                    <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success" name="btn_act" value="actualizar">Actualizar</button>
                                </form>


                                </div>
                            </div>
                        </div>
                    </div>