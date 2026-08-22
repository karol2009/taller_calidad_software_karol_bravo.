<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Frutería Fresh</title>

    <link rel="stylesheet" href="login.css">

</head>


<body>

    <div class="login-container">

        <div class="login-card">


            <!-- ICONO -->

            <div class="user-icon">

                <div class="head"></div>

                <div class="body-icon"></div>

            </div>


            <!-- TITULO -->

            <h1>Frutería Fresh</h1>

            <p class="welcome">
                ¡Bienvenido!
            </p>


            <!-- FORMULARIO -->

            <form action="validar_login.php" method="POST">


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
                    class="login-button"
                >
                    INICIAR SESIÓN
                </button>


            </form>


            <!-- REGISTRO -->

            <div class="register">

                <span>
                    ¿No tienes una cuenta?
                </span>

                <a href="registro.php">
                    Registrarse
                </a>

            </div>


        </div>

    </div>

</body>

</html>