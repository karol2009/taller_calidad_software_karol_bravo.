<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro - Frutería Fresh</title>

    <link rel="stylesheet" href="registrar.css">

</head>


<body>

    <div class="registro-container">

        <div class="registro-card">


            <!-- ICONO -->

            <div class="fruit-icon">

                <span>🍓</span>

            </div>


            <!-- TITULO -->

            <h1>Crear cuenta</h1>

            <p class="welcome">
                Únete a Frutería Fresh
            </p>


            <!-- FORMULARIO -->

            <form action="guardar_usuario.php" method="POST">


                <div class="input-container">

                    <span class="input-icon">👤</span>

                    <input
                        type="text"
                        name="usuario"
                        placeholder="Usuario"
                        required
                    >

                </div>


                <div class="input-container">

                    <span class="input-icon">🔒</span>

                    <input
                        type="password"
                        name="contrasena"
                        placeholder="Contraseña"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="registro-button"
                >
                    CREAR CUENTA
                </button>


            </form>


            <!-- VOLVER AL LOGIN -->

            <div class="login-link">

                <span>
                    ¿Ya tienes una cuenta?
                </span>

                <a href="login.php">
                    Iniciar sesión
                </a>

            </div>


        </div>

    </div>

</body>

</html>