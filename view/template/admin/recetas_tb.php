<script src="../js/jquery-3.2.1.min.js"></script>

<link rel="stylesheet" href="../css/filter_multi_select.css">
<script src="../js/filter-multi-select-bundle.min.js"></script>



<main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">Recetas</h1>
                    <?php include 'modal/addreceta_modal.php' ?>
                    <a href="recetas.php>" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#recetasModal" value="">
                    <img src="../img/icon/registro.png"  alt="" width="24px" height="24px">Nueva Receta</a>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Foto de la receta</th>
                                    <th>Nombre</th>
                                    <th>Dósis</th>
                                    <th>Plantas</th>
                                    <th>Ingredientes</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($query as $data):?>
                                    <tr>
                                        <td><img src="<?php echo $data['foto'] ?>" width="100" height="100"></td>
                                        <td><?php echo $data['nombre']?></td>
                                        <!--<td><?php echo $data['uso']?></td>-->
                                        <td><?php echo $data['dosis']?></td>
                                        <td>
                                            <?php $pr = $this->model_e->p_r($data['IDR']);?>
                                            <select class="form-select" size="3" aria-label="size 3 select example" style="border: none; color:#000;">
                                                <?php foreach($pr as $OPC):?>
                                                    <option><?php echo $OPC['NomCom']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                        <td><?php echo $data['ingredientes']?></td>
                                        <td>
                                        <?php if ($data['estatus']) {
                                            echo '<a class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#delrecetasrModal'.$data['IDR'].'" data-bs-id="'.$data['IDR'].'">Activo<span class="badge badge-light"><img src="../img/icon/cambiar.png" alt="" width="24px" height="24px"></span></a>';
                                        } 
                                        else {
                                            echo '<a class="btn btn-danger btn-custom" data-bs-toggle="modal" data-bs-target="#delrecetasrModal'.$data['IDR'].'" data-bs-id="'.$data['IDR'].'">Inactivo<span class="badge badge-light"><img src="../img/icon/cambiar.png" alt="" width="24px" height="24px"></span></a>';
                                            }?>
                                        </td>
                                        <td>
                                            <a></a>
                                            <a href="" class="btn btn-warning btn-custom" data-bs-toggle="modal" data-bs-target="#CHrecetaModal_<?php echo $data['IDR'] ?>" data-bs-id="<?php echo $data['IDR'] ?>">
                                                <img src="../img/icon/editar.png" alt="" width="24px" height="24px">
                                            </a>
                                        </td>
                                        <?php include 'modal/elimrecetas_modal.php'//receta_modal?>
                                        <?php include 'modal/receta_modal.php'?>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
