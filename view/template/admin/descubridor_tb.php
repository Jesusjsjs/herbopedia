<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-center">Descubridores</h1>
        <?php include 'modal/adddesc_modal.php' ?>
        <a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#descubridoresModal">
            <img src="../img/icon/registro.png" alt="" width="24px" height="24px"> Nuevo Descubridor</a>

        <!-- Tabla de Descubridores -->
        <div class="table-responsive">
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>País de Origen</th>
                        <th>Nacionalidad</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Expediciones Realizadas</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <!--php para generar la tabla-->
                    <?php foreach ($query as $data) : ?>
                        <tr>
                            <td><img src="<?php echo $data['foto'] ?>" width="100" height="100"></td>
                            <td><?php echo $data['nombre']; ?></td><!--nombre-->
                            <td><?php echo $data['pai']; ?></td><!--pais-->
                            <td><?php echo $data['naci']; ?></td><!--nacionalidad-->
                            <td><?php echo $data['f_nac']; ?></td><!--fecha-->
                            <td><?php echo $data['exped_realiz']; ?></td><!--expediciones realizadas-->
                            <td>
                            <?php if ($data['estatus']) {
                                    echo '<a class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#confirmarEliminarModal_'.$data['IDD'].'" data-bs-id="'.$data['IDD'].'">Activo<span class="badge badge-light"><img src="../img/icon/cambiar.png" alt="" width="24px" height="24px"></span></a>';
                                } 
                                else {
                                    echo '<a class="btn btn-danger btn-custom" data-bs-toggle="modal" data-bs-target="#confirmarEliminarModal_'.$data['IDD'].'" data-bs-id="'.$data['IDD'].'">Inactivo<span class="badge badge-light"><img src="../img/icon/cambiar.png" alt="" width="24px" height="24px"></span></a>';
                                    }?>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-custom" data-bs-toggle="modal" data-bs-target="#descubridoresModal_<?php echo $data['IDD'] ?>" data-bs-id="<?php echo $data['IDD'] ?>">
                                    <img src="../img/icon/editar.png" alt="" width="24px" height="24px">
                                </a>
                            </td>
                            <?php include 'modal/descubridor_modal.php' ?>
                            <?php include 'modal/elimdesc_modal.php'?>
                        </tr>
                    <?php endforeach; ?>
                    <!--Fin del php para tabla-->
                </tbody>
            </table>
        </div>

    </div>
</main>