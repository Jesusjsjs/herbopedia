<?php
$listaP =$this->model_e->pais();
$listaDesc =$this->model_e->Descu();
$listafam = $this->model_e->FAMILIA();
$listaEsp = $this->model_e->especie();
?>
<div class="modal fade" id="CHplantaModal_<?php echo $data['IDP']?>"  tabindex="-1"
                        aria-labelledby="CHplantaModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="CHplantaModalLabel">Agregar Planta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <form action="plantas.php?m=get_datosE" method="post"  enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <img src="<?php echo $data['foto'] ?>" width="100" height="100" class="rounded mx-auto d-block"><br>
                                            <label for="fotoDescubridor" class="form-label">Foto de planta</label>
                                            <input type="file" class="form-control" id="fotoDescubridor" accept="image/*" name="foto">
                                        </div>

                                        <div class="mb-3">
                                            <label for="NomCien" class="form-label">Nombre 
                                                Científico</label>
                                            <input type="text" class="form-control" id="nombreDescubridor" value="<?php echo $data['NomCien']?>" name="txt_NomCien" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="NomCien" class="form-label">Nombre 
                                                Común</label>
                                            <input type="text" class="form-control" id="nombrecomun" value="<?php echo $data['NomCom']?>" name="txt_NomCom" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="NomCien" class="form-label">Otros
                                                Nombres</label>
                                            <input type="text" class="form-control" id="OtroNom" value="<?php echo $data['OtroNom']?>" name="txt_OtroNom" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="NomCien" class="form-label">Descripción 
                                            </label>
                                            <textarea class="form-control" id="bioDescubridor" name="txt_Desc" required><?php echo $data['Descrip']?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="NomCien" class="form-label">Uso
                                            </label>
                                            <textarea class="form-control" id="bioDescubridor" name="txt_uso" required><?php echo $data['uso']?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="anoNacimiento" class="form-label">Fecha de 
                                                Descubrimiento</label>
                                            <input type="date" class="form-control" id="anoNacimiento" name="date_des" value="<?php echo $data['FechaDescubr']?>"required>
                                        </div>

    

                                        <div class="mb-3">
                                            <label for="paises" class="form-label">País de Origen</label>
                                            <select class="form-control" id="paises" name="lst_pais" required>
                                                <?php foreach($listaP as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDL'];?>"
                                                     <?php if ($OPC['N_Pais']==$data['nombre_pais']) echo 'selected'; ?>   >
                                                    <?php echo $OPC['N_Pais']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paises" class="form-label">Nombre de especie</label>
                                            <select class="form-control" id="paises" name="lst_esp" required>
                                                <?php foreach($listaEsp as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDE'];?>"
                                                   <?php if ($OPC['Nombre']== $data['nombre_especie']) echo 'selected';?> >
                                                    <?php echo $OPC['Nombre']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>



                                        <div class="mb-3">
                                            <label for="nacionalidad" class="form-label">Descubridor</label>
                                            <select class="form-control" id="nacionalidad" name="lst_des" required>
                                                <?php foreach($listaDesc as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDD'];?>"
                                                    <?php if ($OPC['nombre']== $data['nombre_descubridor']) echo 'selected';?>>
                                                    <?php echo $OPC['nombre']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paises" class="form-label">Familia</label>
                                            <select class="form-control" id="paises" name="lst_fam" required>
                                                <?php foreach($listafam as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDF'];?>"
                                                    <?php if ($OPC['nombrefam']== $data['nombre_familia']) echo 'selected';?>>
                                                    <?php echo $OPC['nombrefam']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>




                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="txt_id" value="<?php echo $data['IDP']; ?>">
                                    <input type="hidden" name="txt_path" value="<?php echo $data['foto']?>">
                                    <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success" name="btn_act" value="actualizar">Actualizar</button>
                                </form>


                                </div>
                            </div>
                        </div>
                    </div>
