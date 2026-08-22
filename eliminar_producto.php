<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$id = $_GET["id"];


$sql = "DELETE FROM productos WHERE id = $id";


if ($conexion->query($sql) === TRUE) {

    header("Location: productos.php");

    exit();

} else {

    echo "Error al eliminar: "
        . $conexion->error;

}

?>