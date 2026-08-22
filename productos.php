<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

require_once "conexion.php";

$sql = "SELECT * FROM productos ORDER BY id DESC";

$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestionar Productos - Frutería Fresh</title>

    <link rel="stylesheet" href="productos.css">

</head>


<body>

<div class="productos-container">


    <!-- ENCABEZADO -->

    <header class="productos-header">

        <div class="header-left">

            <a href="dashboard.php" class="back-button">
                ←
            </a>

            <div>

                <h1>🍎 Gestionar Productos</h1>

                <p>
                    Administra las frutas de tu frutería
                </p>

            </div>

        </div>


        <a href="logout.php" class="logout-button">
            Cerrar sesión
        </a>

    </header>



    <!-- CONTENIDO -->

    <main class="productos-content">


        <!-- AGREGAR PRODUCTO -->

        <section class="add-card">

            <div class="add-title">

                <div class="add-icon">
                    +
                </div>

                <div>

                    <h2>Agregar producto</h2>

                    <p>
                        Registra una nueva fruta
                    </p>

                </div>

            </div>


            <form action="guardar_producto.php" method="POST">


                <!-- NOMBRE -->

                <div class="form-group">

                    <label for="nombre">
                        Nombre del producto
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        placeholder="Ejemplo: Manzana"
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
                        placeholder="Ejemplo: 5000"
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
                        placeholder="Ejemplo: 20"
                        min="0"
                        step="0.01"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="add-button"
                >
                    Agregar producto
                </button>

            </form>

        </section>



        <!-- PRODUCTOS REGISTRADOS -->

        <section class="products-section">


            <div class="section-heading">

                <div>

                    <h2>Productos registrados</h2>

                    <p>
                        Consulta y administra los productos.
                    </p>

                </div>


                <div class="products-count">

                    <?php echo $resultado->num_rows; ?>

                    productos

                </div>

            </div>



            <!-- LISTA -->

            <?php if ($resultado->num_rows > 0): ?>

                <div class="products-list">


                    <!-- ENCABEZADO DE LA LISTA -->

                    <div class="list-header">

                        <div>
                            Producto
                        </div>

                        <div>
                            Precio / kg
                        </div>

                        <div>
                            Cantidad
                        </div>

                        <div>
                            Acciones
                        </div>

                    </div>



                    <!-- PRODUCTOS -->

                    <?php while ($producto = $resultado->fetch_assoc()): ?>

                        <div class="product-row">


                            <!-- NOMBRE -->

                            <div class="product-name">

                                <strong>

                                    <?php

                                    echo htmlspecialchars(
                                        $producto["nombre"]
                                    );

                                    ?>

                                </strong>

                            </div>



                            <!-- PRECIO -->

                            <div class="product-price">

                                $

                                <?php

                                echo number_format(
                                    $producto["precio_por_kg"],
                                    0,
                                    ",",
                                    "."
                                );

                                ?>

                            </div>



                            <!-- PESO -->

                            <div class="product-quantity">

                                <?php

                                echo htmlspecialchars(
                                    $producto["peso"]
                                );

                                ?>

                                kg

                            </div>



                            <!-- ACCIONES -->

                            <div class="actions">


                                <a
                                    href="editar_producto.php?id=<?php echo $producto['id']; ?>"
                                    class="edit-button"
                                >
                                    Editar
                                </a>


                                <a
                                    href="eliminar_producto.php?id=<?php echo $producto['id']; ?>"
                                    class="delete-button"

                                    onclick="return confirm('¿Seguro que deseas eliminar este producto?');"
                                >
                                    Eliminar
                                </a>


                            </div>


                        </div>

                    <?php endwhile; ?>


                </div>


            <?php else: ?>


                <div class="empty-products">

                    <h3>
                        No hay productos registrados
                    </h3>

                    <p>
                        Agrega tu primera fruta usando
                        el formulario de arriba.
                    </p>

                </div>


            <?php endif; ?>


        </section>


    </main>



    <footer>

        🍏 Frutería Fresh

    </footer>


</div>

</body>

</html>