    <main>
    <h2 class="titulo-principal" id="titulo-principal" style="text-align: center">Descubridores</h2>
            <div id="contenedor-productos" class="contenedor-productos">

            <?php foreach ($query as $data) : ?>
            <div>
                <img class="producto-imagen" src="<?php echo $data['foto'] ?>" >
                <div class="producto-detalles">
                    <h3 class="producto-titulo" style="text-align: center; color: #ececec"><?php echo $data['nombre']; ?></h3>

                    <a class="producto-agregar" href="../view/descrip.php?m=tarjeta_D&id=<?php echo $data['IDD']?>">
                        ver más
                    </a>
                </div>
            </div>
            <?php endforeach; ?> 
    </main>
</div>
            