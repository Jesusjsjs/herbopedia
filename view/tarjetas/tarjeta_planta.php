



<main class="section-datos">
        <div class=" col-md-12 titulo">
            <h6><?php echo $query['NomCien']; ?></h6>
            <h2><?php echo $query['NomCom']; ?></h2>
        </div>
        <div class="producto">
            <div class="contenido-datos">
                <img class="contenido-imagen-P" src="<?php echo $query['foto'] ?>">
            </div>

            <div class="contenido-datos">
                <div class="tabla-contenido-P">
                    <h4 class="contenido-mini-P">Descripción</h4>
                    <p class="contenido-descripcion"><?php echo $query['Descrip']; ?></p>
                    <table>
                        <tr>
                            <td>
                                <span class="titulos">Descubridor</span>
                                <p><?php echo $query['nombre_descubridor']; ?></p>
                            </td>
                            <td>
                                <span>Uso</span>
                                <p><?php echo $query['uso']; ?></p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span>Familia</span>
                                <p><?php echo $query['nombre_familia']; ?></p>
                            </td>
                            <td>
                                <span>Especie</span>
                                <p><?php echo $query['nombre_especie']; ?></p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span>País de origen</span>
                                <p><?php echo $query['nombre_pais']; ?></p>
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                <span>Otros nombres</span>
                                <p><?php echo $query['OtroNom']; ?></p>
                            </td>
                            <td>

                                <span>Descubierto el:</span>
                                <p><?php echo $query['FechaDescubr']; ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>


