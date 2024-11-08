        <main>
        
            <?php
                foreach ($_SESSION as $clave => $valor) {
                    echo "Clave: $clave - Valor: $valor<br>";
                }
            ?>
            <h2 class="titulo-principal" id="titulo-principal" style="text-align: center">Plantas</h2>
            <div id="contenedor-productos" class="contenedor-productos">

            <?php foreach ($query as $data) : ?>
            <div>
                <img class="producto-imagen" src="<?php echo $data['foto'] ?>">
                <div class="producto-detalles">
                    <h3 class="producto-titulo" style="text-align: center; color: #ececec"><?php echo $data['NomCom']; ?></h3>

                    <a class="producto-agregar" href="../view/descrip.php?m=tarjeta_P&id=<?php echo $data['IDP']?>">
                        ver más
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            </div>
        </main>
    </div>
