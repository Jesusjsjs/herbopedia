<main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">Especies de plantas</h1>
                    <?php include 'modal/addesp_modal.php' ?>
                    <a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#especiesModal">
                    <img src="../img/icon/registro.png"  alt="" width="24px" height="24px">Nueva Especie</a>

                    <!-- Tabla de Recetas -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Especies</th>
                                    <th>Plantas Pertenecientes</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($query as $data):?>
                                    <tr>
                                        <td><?php echo $data['IDE']?></td>
                                        <td><?php echo $data['Nombre'] ?></td>
                                        <?php  $cc = $this->model_e->count($data['IDE'])?>
                                        <td><?php echo $cc['c'];?></td>
                                        <td>
                                        <a class="btn btn-warning btn-custom" data-bs-toggle="modal" data-bs-target="#especiesModal<?php echo $data['IDE']?>" data-bs-id="<?php echo $data['IDE'] ?>">
                                            <img src="../img/icon/editar.png" alt="" width="24px" height="24px">
                                        </a>
                                        </td>
                                        <?php include 'modal/especies_modal.php'?>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>