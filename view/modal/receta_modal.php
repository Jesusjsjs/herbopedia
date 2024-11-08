<div class="modal fade" id="CHrecetaModal_<?php echo $data['IDR']?>" tabindex="-1" aria-labelledby="recetasModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="recetasModalLabel">Editar Receta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="recetas.php?m=get_datosE" method="post"  enctype="multipart/form-data">
                                        
                                        <div class="mb-3">
                                            <img src="<?php echo $data['foto'] ?>" width="100" height="100" class="rounded mx-auto d-block"><br>
                                            <label for="fotoReceta" class="form-label">Foto de la Receta</label>
                                            <input type="file" class="form-control" id="fotoReceta" accept="image/*" name="foto" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="nombreReceta" class="form-label">Nombre de la Receta</label>
                                            <input type="text" class="form-control" id="nombreReceta" name="txt_nom" value="<?php echo $data['nombre']?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="usoReceta" class="form-label">Uso</label>
                                            <input type="text" class="form-control" id="usoReceta" name="txt_uso" value="<?php echo $data['uso']?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dosisReceta" class="form-label">Dósis</label>
                                            <input type="text" class="form-control" id="dosisReceta" name="txt_dosis" value="<?php echo $data['dosis']?>" required>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="plantas">Plantas</label>
                                            <div class="col-10">
                                                <!---->
                                                <?php $P = $this->model_e->plantas();//$com
                                                ?>
                                                <?php $result = $this->model_e->comp($data['IDR']);
                                                $com = [];

                                                foreach ($result as $fila){
                                                    $com[] = $fila['IDP'];
                                                }
                                                
                                                ?>
                                                <select multiple name="lst_plant[]"  id="pl">
                                                    <!--ERROR-->
                                                    <?php foreach($P as $OPC): ?>
                                                    <option value="<?php echo $OPC['IDP'] ?>"
                                                    <?php echo in_array($OPC['IDP'], $com) ? 'selected':'' ?>
                                                    > <?php echo $OPC['NomCom'] ?>
                                                    </option>
                                                <?php endforeach;?>
                                            </select>
                                                    <!--ERROR-->
                                                    <!---->
                                        </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="ingredientesReceta" class="form-label">Ingredientes</label>
                                            <textarea class="form-control" id="IngredientesReceta" rows="3" name="txt_ingre" required><?php echo $data['ingredientes']?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="elaboracionReceta" class="form-label">Elaboración</label>
                                            <textarea class="form-control" id="elaboracionReceta" rows="3" name="txt_elab" required><?php echo $data['elaboracion']?></textarea>
                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="txt_id" value="<?php echo $data['IDR']; ?>">
                                    <input type="hidden" name="txt_path" value="<?php echo $data['foto'];?>">
                                    <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success" name="btn_act" value="actualizar">Actualizar</button>
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>






