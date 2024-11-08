<div class="modal fade" id="recetasModal" tabindex="-1" aria-labelledby="recetasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recetasModalLabel">Nueva Receta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="container" action="recetas.php?m=get_datosE" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <img id="pv" src="../img/icon/imagen.png" width="100" height="100" class="rounded mx-auto d-block"><br>
                        <label for="fotoReceta" class="form-label">Foto de la Receta</label>
                        <input type="file" class="form-control" id="fotoReceta" accept="image/*" name="foto" required onchange="prev(event)">
                    </div>
                    <div class="mb-3">
                        <label for="nombreReceta" class="form-label">Nombre de la Receta</label>
                        <input type="text" class="form-control" id="nombreReceta" name="txt_nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="usoReceta" class="form-label">Uso</label>
                        <input type="text" class="form-control" id="usoReceta" name="txt_uso" required>
                    </div>
                    <div class="mb-3">
                        <label for="dosisReceta" class="form-label">Dósis</label>
                        <input type="text" class="form-control" id="dosisReceta" name="txt_dosis" required>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="plantas">Plantas</label>
                        <div class="col-10">
                            <select multiple name="lst_plant[]" id="pl" class="filter-multi-select">
                            <?php foreach ($listaP as $OPC) : ?>
                                <option value="<?php echo $OPC['IDP']; ?>"><?php echo $OPC['NomCom'] ?></option>
                            <?php endforeach; ?>
                            </select>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="ingredientesReceta" class="form-label">Ingredientes</label>
                        <textarea class="form-control" id="IngredientesReceta" rows="3" name="txt_ingre" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="elaboracionReceta" class="form-label">Elaboración</label>
                        <textarea class="form-control" id="elaboracionReceta" rows="3" name="txt_elab" required></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="txt_path" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" name="btn_act" value="registrar">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    let prev = (event) => {

        let img = new FileReader();
        let id_img = document.getElementById('pv');

        img.onload = ()=>{
            if(img.readyState == 2){
                id_img.src = img.result
            }
        }

        img.readAsDataURL(event.target.files[0]);
    }
</script>

<script>
$(function () {
var planta = $('#pl').filterMultiSelect();
});

</script>