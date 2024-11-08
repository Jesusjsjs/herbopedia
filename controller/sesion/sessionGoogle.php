<?php


include_once "../../bd/Bd.php";

$Bd = new Bd();
$conn = $Bd->connect();

if (isset($_GET['email']) && isset($_GET['accessToken']) && isset($_GET['displayName'])) {
    $email = $_GET['email'];
    $accessToken = $_GET['accessToken'];
    $displayName = $_GET['displayName'];


    // Verifica si el usuario ya existe en la base de datos
    $query = "SELECT * FROM usuario WHERE Correo = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);



    if ($result) {
        // Si el usuario ya existe, actualiza el accessToken
        $updateQuery = "UPDATE usuario SET accessToken_google = :accessToken WHERE Correo = :email";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bindValue(':accessToken', $accessToken);
        $updateStmt->bindValue(':email', $email);
        $updateStmt->execute();

        $userQuery = "SELECT * FROM usuario WHERE Correo = :email";
        $userStmt = $conn->prepare($userQuery);
        $userStmt->bindValue(':email', $email);
        $userStmt->execute();
        $userData = $userStmt->fetch(PDO::FETCH_ASSOC);


        echo $userData['ID'];

        session_start(); // Inicia la sesión al comienzo del archivo
        $_SESSION['nombre'] = $displayName;
        $_SESSION['idt'] = 2;
        $_SESSION['id'] = $userData['ID'];
 
        // echo "Hola de nuevo ";





    } else {


        echo"Nuevo usuario";    echo "<br/>";
        // Si el usuario no existe, inserta un nuevo registro
        $insertQuery = "INSERT INTO usuario (Nombres, Apellido, Correo, IDT,accessToken_google) VALUES (:firstName, :lastName, :email, :IDT,:accessToken)";


        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bindValue(':firstName', $displayName);
        $insertStmt->bindValue(':lastName', $displayName);
        $insertStmt->bindValue(':email', $email);
        $insertStmt->bindValue(':IDT', 2);
        $insertStmt->bindValue(':accessToken', $accessToken);

        $insertStmt->execute();



        session_start(); // Inicia la sesión al comienzo del archivo
        $_SESSION['nombre'] = $displayName;

        echo "Nuevo usuario creado";
    }

    // Crea la sesión con el nombre del usuario

    // Cierra la conexión (PDO lo hace automáticamente al destruir el objeto)
    $stmt = null;
    $conn = null;

} else {
    echo "Faltan parámetros en la solicitud GET.";
}
