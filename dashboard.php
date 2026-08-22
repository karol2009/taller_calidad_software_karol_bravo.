<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel Administrativo - Frutería Fresh</title>

    <link rel="stylesheet" href="dashboard.css">

</head>

<body>

    <div class="dashboard-container">


        <!-- BARRA SUPERIOR -->

        <header class="navbar">

            <div class="brand">

                <div class="brand-icon">
                    🍎
                </div>

                <div>
                    <h1>Frutería Fresh</h1>
                    <p>Panel administrativo</p>
                </div>

            </div>


            <a href="logout.php" class="logout-button">
                Cerrar sesión
            </a>

        </header>


        <!-- CONTENIDO -->

        <main class="dashboard-content">


            <!-- BIENVENIDA -->

            <section class="welcome-card">

                <div class="welcome-fruit">
                    🍓
                </div>

                <div>

                    <h2>
                        ¡Hola,
                        <?php echo htmlspecialchars($_SESSION["usuario"]); ?>! 👋
                    </h2>

                    <p>
                        Bienvenido a tu panel de administración.
                    </p>

                </div>

            </section>


            <!-- TITULO -->

            <section class="section-title">

                <h2>Administración</h2>

                <p>
                    Gestiona los productos de tu frutería.
                </p>

            </section>


            <!-- PRODUCTOS -->

            <section class="products-card">

                <div class="product-icon">
                    🍎
                </div>

                <div class="product-info">

                    <h3>
                        Productos
                    </h3>

                    <p>
                        Agrega nuevos productos, consulta los
                        productos registrados, modifica sus datos
                        o elimínalos cuando sea necesario.
                    </p>

                    <a href="productos.php" class="products-button">
                        Administrar productos →
                    </a>

                </div>

            </section>


        </main>


        <!-- PIE DE PÁGINA -->

        <footer>

            🍏 Frutería Fresh

        </footer>


    </div>

</body>

</html>