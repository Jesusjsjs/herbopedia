<?php 
include_once('../bd/validate.php');
?>
<link rel="stylesheet" src="../css/brands.min.css">

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <a href="../index.html" class="btn btn-primary"><i class="fas fa-home"></i></a>
                        <h3 class="text-center font-weight-light my-4">Acceso al Modo Premium</h3>
                        </div>
                    <div class="card-body">
                        <form action="access.php?m=datosPremium" method="post">
                            <div class="mb-3">
                                <h5 class="card-title">Nombre del Propietario</h5>
                            </div>


                            <div class="form-floating mb-3">
                                <div class="input-group"></div>
                                <input class="form-control" id="inputCardNumber" type="text" placeholder="Número de Tarjeta" name="txt_tarjeta" required/>
                                <label for="inputCardNumber">Número de Tarjeta (<span class="type">...</span>)</label>
                            </div>
<!--(<span class="type">unknown</span>)-->


                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputCardName" type="text" placeholder="Nombre en la Tarjeta" name="txt_nombre_tarjeta" required/>
                                <label for="inputCardName">Nombre en la Tarjeta</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputExpiryDate" type="text" placeholder="MM/AA" name="txt_fecha_vencimiento" required/>
                                        <label for="inputExpiryDate">Fecha de Vencimiento</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputCVC" type="text" placeholder="CVC" name="txt_cvc" minlength="3" maxlength="3" required/>
                                        <label for="inputCVC">CVC</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
                                <a class="small" href="access.php?m=ayuda">¿Necesitas ayuda?</a>
                                <button type="submit" class="btn btn-primary">Acceder al Modo Premium</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        *Una vez realizado el pago, será necesario iniciar sesión de nuevo
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error de Acceso al Modo Premium</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="errorMessage">
                <!-- Mensaje de error se establecerá aquí desde el script PHP -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="../js/cleave.min.js"></script>
<script>
    var tarjeta = document.getElementById("targ");

    var cleave = new Cleave('#inputCardNumber', {
    creditCard: true,
    onCreditCardTypeChanged: function (type) {

        if(type == unknow){
        document.querySelector('.type').innerHTML = "(..)";}
        else{
        document.querySelector('.type').innerHTML = type;}


    }
});

var cleave = new Cleave('#inputExpiryDate', {
    date: true,
    datePattern: ['m', 'y']
});
</script>