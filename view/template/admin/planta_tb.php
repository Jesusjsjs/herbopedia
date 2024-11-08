<main>
<div class="container-fluid px-4">
<h1 class="mt-4 text-center">Plantas</h1>
        <?php include 'modal/addplanta_modal.php' ?>
        <a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#plantaModal" value="">
            <img src="../img/icon/registro.png" alt="" width="24px" height="24px"> Nueva Planta</a>

                    <!-- Tabla de Plantas -->
                    <div class="table-responsive">
                    <table class="table table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre Cientifico</th>
                                <th>Nombre Común</th>
                                <th>Familia</th>
                                <th>Lugar de Origen</th>
                                <th>Descubridor</th>
                                <th>Fecha de descubrimiento</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                                <!--php para generar la tabla-->
                    <?php foreach ($query as $data) : ?>
                        <tr>
                            <td><img src="<?php echo $data['foto'] ?>" width="100" height="100"></td><!--foto-->
                            <td><?php echo $data['NomCien']; ?></td><!--nombre-->
                            <td><?php echo $data['NomCom']; ?></td><!--biografia-->
                            <td><?php echo $data['nombre_familia']; ?></td><!--pais-->
                            <td><?php echo $data['nombre_pais']; ?></td><!--expediciones realizadas-->
                            <td><?php echo $data['nombre_descubridor']; ?></td><!--expediciones realizadas-->
                            <td><?php echo $data['FechaDescubr']; ?></td><!--fecha-->
                            <td >
                                <?php if ($data['Estatus']) {
                                    echo '<a class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#delplantasrModal'.$data['IDP'].'" data-bs-id="'.$data['IDP'].'">Activo<span class="badge badge-light"><img src="../img/icon/cambiar.png" alt="" width="24px" height="24px"></span></a>';
                                } 
                                else {
                                    echo '<a class="btn btn-danger btn-custom" data-bs-toggle="modal" data-bs-target="#delplantasrModal'.$data['IDP'].'" data-bs-id="'.$data['IDP'].'">Inactivo<span class="badge badge-light"><img src="../img/icon/cambiar.png" alt="" width="24px" height="24px"></span></a>';
                                    }?>
                            </td>

                            <td>
                                <a class="btn btn-warning btn-custom" data-bs-toggle="modal" data-bs-target="#CHplantaModal_<?php echo $data['IDP'] ?>" data-bs-id="<?php echo $data['IDP'] ?>">
                                    <img src="../img/icon/editar.png" alt="" width="24px" height="24px">
                                </a>
                            </td>
                            <?php include 'modal/elimplantas_modal.php'?>
                            <?php include 'modal/plantas_modal.php' ?>
                        </tr>
                    <?php endforeach; ?>
                    
                        </tbody>
                    </table>

                    </div>

</div>
</main>



