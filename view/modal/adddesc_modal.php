<div class="modal fade" id="descubridoresModal" tabindex="-1"
                        aria-labelledby="descubridoresModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="descubridoresModalLabel">Agregar Descubridor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <form action="descubridores.php?m=get_datosE" method="post"  enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Foto del Descubridor</label>
                                            <input type="file" class="form-control" id="foto"
                                                accept="image/*" name="foto" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nombreDescubridor" class="form-label">Nombre del
                                                Descubridor</label>
                                            <input type="text" class="form-control" id="nombreDescubridor" name="txt_nom" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="areaDescubridor" class="form-label">Biografía</label>
                                            <input type="text" class="form-control" id="bioDescubridor" name="txt_bio" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paises" class="form-label">País de Origen</label>
                                            <select class="form-control" id="paises" name="lst_pai" required>
                                                <?php foreach($listaP as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDL'];?>"><?php echo $OPC['N_Pais']?></option>
                                                <?php endforeach;
                                                ?>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                                            <select class="form-control" id="nacionalidad" name="lst_naci" required>
                                                <?php foreach($listaN as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDL'];?>"><?php echo $OPC['Gentilicio']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="anoNacimiento" class="form-label">Fecha de Nacimiento del
                                                Descubridor</label>
                                            <input type="date" class="form-control" id="anoNacimiento" name="date_nac" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="expediciones" class="form-label">Expediciones Realizadas</label>
                                            <input type="text" class="form-control" id="expediciones" name="txt_exp" required>
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
