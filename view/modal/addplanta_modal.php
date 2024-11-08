<div class="modal fade" id="plantaModal"  tabindex="-1"
                        aria-labelledby="plantaModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="plantaModalLabel">Agregar Planta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <form action="plantas.php?m=get_datosE" method="post"  enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Foto de la Planta</label>
                                            <input type="file" class="form-control" id="foto"
                                                accept="image/*" name="foto" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="NomCien" class="form-label">Nombre 
                                                Científico</label>
                                            <input type="text" class="form-control" id="nombreDescubridor" name="txt_NomCien" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="NomCien" class="form-label">Nombre 
                                                Común</label>
                                            <input type="text" class="form-control" id="nombrecomun" name="txt_NomCom" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="NomCien" class="form-label">Otros
                                                Nombres</label>
                                            <input type="text" class="form-control" id="OtroNom" name="txt_OtroNom" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="NomCien" class="form-label">Descripción 
                                            </label>
                                            <textarea class="form-control" id="nombrecomun" name="txt_Desc" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="NomCien" class="form-label">Uso
                                            </label>
                                            <input type="text" class="form-control" id="nombrecomun" name="txt_uso" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="anoNacimiento" class="form-label">Fecha de 
                                                Descubrimiento</label>
                                            <input type="date" class="form-control" id="anoNacimiento" name="date_des" required>
                                        </div>

    

                                        <div class="mb-3">
                                            <label for="paises" class="form-label">País de Origen</label>
                                            <select class="form-control" id="paises" name="lst_pais" required>
                                                <?php foreach($listaP as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDL'];?>"><?php echo $OPC['N_Pais']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paises" class="form-label">Nombre de especie</label>
                                            <select class="form-control" id="paises" name="lst_esp" required>
                                                <?php foreach($listaEsp as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDE'];?>"><?php echo $OPC['Nombre']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>



                                        <div class="mb-3">
                                            <label for="nacionalidad" class="form-label">Descubridor</label>
                                            <select class="form-control" id="nacionalidad" name="lst_des" required>
                                                <?php foreach($listaDesc as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDD'];?>"><?php echo $OPC['nombre']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paises" class="form-label">Familia</label>
                                            <select class="form-control" id="paises" name="lst_fam" required>
                                                <?php foreach($listafam as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDF'];?>"><?php echo $OPC['nombrefam']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="txt_path" value="">
                                    <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success" name="btn_act" value="registrar">Guardar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
