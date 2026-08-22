<?php

session_start();

include("conexion.php");

$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

$sql = "SELECT * FROM usuarios
        WHERE usuario = '$usuario'
        AND contrasena = '$contrasena'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

    $_SESSION["usuario"] = $usuario;

    header("Location: dashboard.php");
    exit();

} else {

    echo "Usuario o contraseña incorrectos.";

}

?>