<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><a href="../index.html" class="btn btn-primary"><i class="fas fa-home"></i></a>
                        <h3 class="text-center font-weight-light my-4">Inicio de sésion</h3>
                    </div>
                    <div class="card-body">
                        <form action="access.php?m=datosL" method="post">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="txt_correo" value="<?php if (isset($_REQUEST['mail'])) echo $_REQUEST['mail'] ?>" required />
                                <label for="inputEmail">Direccion Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="txt_contra" required />
                                <label for="inputPassword">Contraseña</label>
                            </div>
                            <div class="form-check mb-3">
                                <label class="form-check-label text-danger"> <?php if (isset($_REQUEST['mail']))
                                echo '<strong>Correo y/o contraseña incorrectos</strong>' ?></label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="access.php?m=password">¿olvidaste tu contraseña?</a>
                                <button type="submint" class="btn btn-primary">Inicio de sésion</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <button id="iniciarGoogle">Iniciar con google</button>
                        <button id="cerrarSesion">Cerrar sesión</button>
                        <div id="status">Verificando sesión...</div>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="access.php?m=register">¿no tienes cuenta? ¡Registrate!</a></div>
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
                <h5 class="modal-title" id="errorModalLabel">Error de inicio de sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="errorMessage">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error de inicio de sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="errorMessage">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="module">

    
    console.time( "Iniciando app" )
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-analytics.js";


    // Add Firebase products that you want to use
    import { getAuth, GoogleAuthProvider, signInWithPopup, onAuthStateChanged  } from 'https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js'
    import { getFirestore } from 'https://www.gstatic.com/firebasejs/10.9.0/firebase-firestore.js'
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyCtOWDCQM9wTACivdvufwV-WWweRFCYutM",
        authDomain: "hervalopedia.firebaseapp.com",
        projectId: "hervalopedia",
        storageBucket: "hervalopedia.appspot.com",
        messagingSenderId: "212480498239",
        appId: "1:212480498239:web:bfe50bc819477ad02a368a"
    };


    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    

    const auth = getAuth();
    const provider = new GoogleAuthProvider();

    document.getElementById("iniciarGoogle").addEventListener( "click", ()=>{
        abrirPopupGoogle()
    } )

    console.timeEnd("Iniciando app")

    function abrirPopupGoogle(){
        signInWithPopup(auth, provider)
        .then((result) => {
            // This gives you a Google Access Token. You can use it to access the Google API.
            const credential = GoogleAuthProvider.credentialFromResult(result);
            const token = credential.accessToken;
            // The signed-in user info.
            const user = result.user;
            // IdP data available using getAdditionalUserInfo(result)

            console.log( user );

            console.log(user.accessToken);
            console.log(user.displayName);
            console.log(user.email);


            window.location.href = "http://localhost/herbopedia/controller/sesion/sessionGoogle.php?email=" + user.email + "&accessToken=" + user.accessToken + "&displayName=" + user.displayName;

            // ...
        }).catch((error) => {
            // Handle Errors here.
            const errorCode = error.code;
            const errorMessage = error.message;
            // The email of the user's account used.
            const email = error.customData.email;
            // The AuthCredential type that was used.
            const credential = GoogleAuthProvider.credentialFromError(error);
            // ...

            window.close();

        });
    }

    // Función para cerrar sesión
    function cerrarSesion() {
        auth.signOut()
            .then(() => {
                console.log("Sesión cerrada correctamente.");
                // Aquí puedes agregar acciones adicionales, como redirigir al usuario a la página de inicio.
            })
            .catch((error) => {
                console.error("Error al cerrar sesión:", error);
            });
    }

    // Agrega un listener al botón de cerrar sesión
    document.getElementById("cerrarSesion").addEventListener("click", cerrarSesion);


    onAuthStateChanged(auth, ( user ) => {
        if ( user ) {
            // Si el usuario está autenticado
            console.log("Sesión iniciada:");
            console.log("Usuario:", user.displayName);
            console.log("Email:", user.email);
            console.log("UID:", user.uid);
            document.getElementById("status").textContent = `Bienvenido, ${user.displayName}`;
        } else {
            // Si el usuario no está autenticado
            console.log("No hay sesión iniciada.");
            document.getElementById("status").textContent = "No hay sesión iniciada";
        }
    });


</script>