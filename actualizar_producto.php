<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$id = $_POST["id"];

$nombre = $_POST["nombre"];

$tipo = $_POST["tipo"];

$precio_por_kg = $_POST["precio_por_kg"];

$peso = $_POST["peso"];


$sql = "UPDATE productos

        SET nombre = '$nombre',

            tipo = '$tipo',

            precio_por_kg = '$precio_por_kg',

            peso = '$peso'

        WHERE id = $id";


if ($conexion->query($sql) === TRUE) {

    header("Location: productos.php");

    exit();

} else {

    echo "Error al actualizar: "
        . $conexion->error;

}

?>