<?php 
$listaP =$this->model_e->pais();
$listaN =$this->model_e->nacionalidades();
?>
<div class="modal fade" id="descubridoresModal_<?php echo $data['IDD']?>" tabindex="-1"
                        aria-labelledby="descubridoresModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="descubridoresModalLabel">Actualizar Descubridor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="descubridores.php?m=get_datosE" method="post"  enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <img src="<?php echo $data['foto'] ?>" width="100" height="100" class="rounded mx-auto d-block"><br>
                                            <label for="fotoDescubridor" class="form-label">Foto del Descubridor</label>
                                            <input type="file" class="form-control" id="fotoDescubridor" accept="image/*" name="foto">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nombreDescubridor" class="form-label">Nombre del
                                                Descubridor</label>
                                            <input type="text" class="form-control" id="nombreDescubridor" name="txt_nom" value="<?php echo $data['nombre']?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="areaDescubridor" class="form-label">Biografía</label>
                                            <textarea class="form-control" id="bioDescubridor" name="txt_bio" required><?php echo $data['biografia']?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paises" class="form-label">País de Origen</label>
                                            <select class="form-control" id="paises" name="lst_pai" required>
                                            <?php foreach($listaP as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDL'];?>"
                                                    <?php if($OPC['N_Pais']==$data['pai']) echo 'selected'; ?>>
                                                    <?php echo $OPC['N_Pais']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                                            <select class="form-control" id="nacionalidad" name="lst_naci" required>
                                                <?php foreach($listaN as $OPC):?>
                                                    <option value="<?php echo $OPC['IDL']?>" 
                                                    <?php if($OPC['Gentilicio']==$data['naci']) echo 'selected';?>> <?php echo $OPC['Gentilicio']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="anoNacimiento" class="form-label">Fecha de Nacimiento del
                                                Descubridor</label>
                                            <input type="date" class="form-control" id="anoNacimiento" name="date_nac"  value="<?php echo $data['f_nac']?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="expediciones" class="form-label">Expediciones Realizadas</label>
                                            <textarea class="form-control" id="expediciones" name="txt_exp" required><?php echo $data['exped_realiz']?></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="txt_id" value="<?php echo $data['IDD']; ?>">
                                    <input type="hidden" name="txt_path" value="<?php echo $data['foto']?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success"  name="btn_act" value="actualizar">Actualizar</button>
                                </form>



                                </div>
                            </div>
                        </div>
                    </div>
