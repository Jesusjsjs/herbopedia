<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><a href="../index.html" class="btn btn-primary"><i class="fas fa-home"></i></a>
                        <h3 class="text-center font-weight-light my-4">Crear una cuenta</h3>
                    </div>
                    <div class="card-body">
                        <form action="access.php?m=datosR" method="post" name="validar" id="validar">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Nombre" name="txt_nombre" required />
                                        <label for="inputFirstName">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Apellido" name="txt_apellido" required />
                                        <label for="inputLastName">Apellido</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="txt_correo" value="<?php if(isset($_REQUEST['correo'])) echo $_REQUEST['correo'] ?>" required />
                                <label for="inputEmail">Direccion email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputDate" type="date" name="dt_nac" required />
                                <label for="inputDate">Fecha de Nacimiento</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" type="password" placeholder="Contraseña" name="txt_contra" required />
                                        <label for="inputPassword">Contraseña</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirmar Contraseña" txt="txt_conf" required />
                                        <label for="inputPasswordConfirm">Confirmar contraseña</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block">Crear cuenta</button></div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="access.php?m=login">¿Tiene una cuenta? Ir a iniciar sesión</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function comparar() {
        ps1 = document.validar.inputPassword.value
        ps2 = document.validar.inputPasswordConfirm.value

        if (ps1 == ps2)
            document.comparar.submit();
        else alert("Las contraseñas no coincidieron")
    }
</script>