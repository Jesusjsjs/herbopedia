<div class="modal fade" id="detalles" tabindex="-1" aria-labelledby="detalles" aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="dt">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmarEliminarModalLabel">Detalles</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="ecuacion" class="form-label">Ecuación:</label>
                                            <input type="text" class="form-control" id="" value="(p * x) - ((u-Ub)/Pc* Ua + Cb)" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ecuacion" class="form-label">Ecuación resultante:</label>
                                            <input type="text" class="form-control" id="eq" value="" disabled>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="ecuacion" class="form-label">Total de usuarios (u):</label>
                                                <input type="number" class="form-control" id="usuarios" value="<?php echo $u['usuarios']?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ecuacion" class="form-label">Aumento en 20(a):</label>
                                                <input type="number" class="form-control" id="v" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="ecuacion" class="form-label">Usuarios premium(p):</label>
                                                <input type="number" class="form-control" id="premium" value="<?php echo $p['premium']?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ecuacion" class="form-label">Precio de suscripción(x):</label>
                                                <input type="text" class="form-control" id="x" value="x">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="ecuacion" class="form-label">Servidor-coste base (Cb): $</label>
                                                <input type="number" class="form-control" id="coste" value="220">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ecuacion" class="form-label"> Usuarios-cantidad base (Ub): $</label>
                                                <input type="number" class="form-control" id="base" value="100">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="ecuacion" class="form-label">Por cada(Pc):</label>
                                                <input type="number" class="form-control" id="cada" value="20">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ecuacion" class="form-label">Usuarios aumenta(Ua) $</label>
                                                <input type="number" class="form-control" id="aumenta" value="15">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <input type="submit" class="btn btn-success"value="Cambiar datos" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
