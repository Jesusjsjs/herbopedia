<main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">Familias de plantas</h1>
                    <?php include 'modal/addfam_modal.php' ?>
                    <a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#familiasModal">
                    <img src="../img/icon/registro.png"  alt="" width="24px" height="24px">Nueva Familia</a>

                    <!-- Tabla de Recetas -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Familia</th>
                                    <th>Plantas Pertenecientes</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($query as $data):?>
                                    <tr>
                                        <td><?php echo $data['IDF']?></td>
                                        <td><?php echo $data['nombrefam'] ?></td>
                                        <?php  $cc = $this->model_e->count($data['IDF'])?>
                                        <td><?php echo $cc['c'];?></td>
                                        <td>
                                        <a class="btn btn-warning btn-custom" data-bs-toggle="modal" data-bs-target="#familiasModal<?php echo $data['IDF']?>" data-bs-id="<?php echo $data['IDF'] ?>">
                                            <img src="../img/icon/editar.png" alt="" width="24px" height="24px">
                                        </a>
                                        </td>
                                        <?php include 'modal/familia_modal.php'?>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>