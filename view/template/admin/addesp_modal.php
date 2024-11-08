<div class="modal fade" id="especiesModal" tabindex="-1"
                        aria-labelledby="descubridoresModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="descubridoresModalLabel">Agregar Especie de plantas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <form action="especies.php?m=get_datosE" method="post"  enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="nombreDescubridor" class="form-label">Nombre de la especie</label>
                                            <input type="text" class="form-control" id="nombreFamilia" name="txt_nom" required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="txt_path" value="">
                                    <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success" name="btn_act" value="registrar">Guardar</button>
                                </form>


                                </div>
                            </div>
                        </div>
                    </div>