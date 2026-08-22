<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

require_once "conexion.php";


/* Comprobar ID */

if (!isset($_GET["id"])) {
    header("Location: productos.php");
    exit();
}

$id = intval($_GET["id"]);


/* Buscar producto */

$sql = "SELECT * FROM productos WHERE id = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();


if ($resultado->num_rows == 0) {
    header("Location: productos.php");
    exit();
}

$producto = $resultado->fetch_assoc();


/* Actualizar producto */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"]);

    $precio_por_kg = $_POST["precio_por_kg"];

    $peso = $_POST["peso"];

    // El tipo será igual al nombre
    $tipo = $nombre;


    $sql_update = "
        UPDATE productos
        SET
            nombre = ?,
            tipo = ?,
            precio_por_kg = ?,
            peso = ?
        WHERE id = ?
    ";


    $stmt_update = $conexion->prepare($sql_update);

    $stmt_update->bind_param(
        "ssddi",
        $nombre,
        $tipo,
        $precio_por_kg,
        $peso,
        $id
    );


    if ($stmt_update->execute()) {

        /*
         * Después de guardar volvemos a productos.php.
         * Esto hace que el formulario de edición se cierre
         * y los campos queden vacíos al volver a agregar.
         */

        header("Location: productos.php");
        exit();

    } else {

        $error = "No se pudo actualizar el producto.";

    }


    $stmt_update->close();
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Editar producto</title>

    <link rel="stylesheet" href="editar.css">

</head>


<body>


<div class="edit-page">


    <div class="edit-card">


        <div class="edit-title">

            <div class="edit-icon">
                ✏️
            </div>

            <h1>
                Editar producto
            </h1>

            <p>
                Modifica la información de tu fruta
            </p>

        </div>


        <?php if (isset($error)): ?>

            <div class="error-message">

                <?php echo $error; ?>

            </div>

        <?php endif; ?>


        <form
            method="POST"
            class="edit-form"
        >


            <!-- NOMBRE -->

            <div class="form-group">

                <label for="nombre">
                    Nombre del producto
                </label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="<?php
                        echo htmlspecialchars(
                            $producto["nombre"]
                        );
                    ?>"
                    required
                >

            </div>


            <!-- PRECIO -->

            <div class="form-group">

                <label for="precio_por_kg">
                    Precio por kilogramo
                </label>

                <input
                    type="number"
                    id="precio_por_kg"
                    name="precio_por_kg"
                    value="<?php
                        echo htmlspecialchars(
                            $producto["precio_por_kg"]
                        );
                    ?>"
                    min="0"
                    step="0.01"
                    required
                >

            </div>


            <!-- PESO -->

            <div class="form-group">

                <label for="peso">
                    Cantidad disponible (kg)
                </label>

                <input
                    type="number"
                    id="peso"
                    name="peso"
                    value="<?php
                        echo htmlspecialchars(
                            $producto["peso"]
                        );
                    ?>"
                    min="0"
                    step="0.01"
                    required
                >

            </div>


            <!-- BOTONES -->

            <div class="edit-buttons">

                <a
                    href="productos.php"
                    class="cancel-button"
                >
                    Cancelar
                </a>


                <button
                    type="submit"
                    class="save-button"
                >
                    Guardar cambios
                </button>

            </div>


        </form>


    </div>


</div>


</body>

</html>