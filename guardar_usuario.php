<?php

include("conexion.php");

$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

// Comprobar si el usuario ya existe
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

    echo "El usuario ya existe.";
    echo "<br><br>";
    echo '<a href="registro.php">Volver al registro</a>';

    exit();
}

// Registrar el nuevo usuario
$sql = "INSERT INTO usuarios (usuario, contrasena)
        VALUES ('$usuario', '$contrasena')";

if ($conexion->query($sql) === TRUE) {

    // Después de registrarse, volver al inicio de sesión
    header("Location: login.php");
    exit();

} else {

    echo "Error al registrar el usuario: "
        . $conexion->error;

}

?>