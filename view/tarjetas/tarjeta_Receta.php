<main class="section-datos">
        <div class=" col-md-12 titulo">
            <h2 class="contenido-titulo"><?php echo $query['nombre']; ?></h2>
        </div>
        <div class="producto">
            <div>
                <img class="contenido-imagen" src="<?php echo $query['foto'] ?>">
            </div>

            <div>
                <div class="tabla-contenido">
                    <table>
                        <tr>
                            <td>
                                <span>Ingredientes</span>
                                <ul><?php echo $query['ingredientes'] ?></ul>
                            </td>
                            <td>
                                <span>Plantas</span>
                                <ul>
                                    <?php foreach ($planta as $p):?>
                                        <li><?php echo $p['NomCom']?></li>
                                    <?php endforeach;?>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span>Uso</span><br>
                                <label for=""><?php echo $query['uso'] ?></label><br>
                            </td>
                            <td>
                                <span>Dosis</span><br>
                                <label for=""><?php echo $query['dosis'] ?></label><br>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="contenido-datos">
                    <h3 class="contenido-mini">Elaboración</h3>
                    <p class="contenido-elaboracion"><?php echo $query['elaboracion'] ?></p>
                </div>
            </div>
        </div>
    </main>
