<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

require_once "conexion.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $nombre = trim($_POST["nombre"]);

    $precio_por_kg = $_POST["precio_por_kg"];

    $peso = $_POST["peso"];


    /*
     * Como decidimos que producto y tipo
     * sean el mismo dato:
     */

    $tipo = $nombre;


    $sql = "INSERT INTO productos
            (nombre, tipo, precio_por_kg, peso)
            VALUES (?, ?, ?, ?)";


    $stmt = $conexion->prepare($sql);


    $stmt->bind_param(
        "ssdd",
        $nombre,
        $tipo,
        $precio_por_kg,
        $peso
    );


    if ($stmt->execute()) {

        header("Location: productos.php");

        exit();

    } else {

        echo "Error al guardar el producto: "
             . $stmt->error;

    }


    $stmt->close();

}


$conexion->close();

?>