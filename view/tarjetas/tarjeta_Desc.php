

<main class="section-datos">
        <div class=" col-md-12 titulo">
            <h2 class="contenido-titulo"><?php echo $query['nombre']; ?></h2>
        </div>
        <div class="producto">

            <div>
                <img class="contenido-imagen-D" src="<?php echo $query['foto'] ?>"><br>
            
                <table class="tabla-contenido-D">
                    <tr>
                        <td>
                            <span>Nacionalidad</span><br>
                            <label for=""><?php echo $query['naci'] ?></label><br>
                        </td>
                        <td>
                            <span>País</span><br>
                            <label for=""><?php echo $query['pai'] ?></label><br>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <div class="contenido-datos-d">
                    <h3 class="contenido-mini-D">Biografía</h3>
                    <p class="contenido-elaboracion"> <?php echo $query['biografia'] ?></p>
                </div>

                <div class="tabla-contenido">
                        <tr>
                            <td>
                                <span>Expediciones</span><br>
                                <p class="contenido-elaboracion"><?php echo $query['exped_realiz'] ?></p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span>Fecha de Nacimiento</span><br>
                                <p class="contenido-elaboracion"><?php echo $query['f_nac'] ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</main>