<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap_5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="Recursos/dice-d20-solid.svg ">
    <title>Iniciar Sesion</title>
</head>

<body>
    <nav class="navbar">
        <ul class="nav right">
            <li class="nav-item">
                <a href="Inicio.php" class="nav-link">
                    <i class="fa-solid fa-house"></i> Inicio
                </a>
            </li>
        </ul>
        <ul class="nav left">
            <li class="nav-item">
                <a href="Registro.php" class="nav-link">
                    <i class="fa-solid fa-user-plus"></i> Registrarse
                </a>
            </li>
            <li class="nav-item">
                <a href="IniciarSesion.php" class="nav-link active">
                    <i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesi&oacute;n
                </a>
            </li>
        </ul>
    </nav>

    <div class="main_container">
        <form id="employee_login" method="post">
            <div class="employee_data">

                <div class="employee_data">
                    <label class="form-label" for="email">Correo electr&oacute;nico:</label>
                    <input type="email" class="form-control" id="nombre" tabindex="3">
                </div>

                <div class="employee_data">
                    <label class="form-label" for="password">Contrase&ntilde;a:</label>
                    <div class="input-con-boton">
                        <input type="password" class="form-control" id="nombre" tabindex="4">
                        <button class="mostrar" type="button"><i class="fa-solid fa-eye"></i></button>
                        <button class="ocultar" type="button"><i class="fa-solid fa-eye-slash"></i></button>
                    </div>
                </div>

            </div>

            <button class="btn btn-primary" type="submit">Iniciar Sesi&oacute;n</button>

            <div class="registrarse">
                <span>¿A&uacute;n no tienes cuenta?</span>
                <span><a href="Registro.php">Crea tu cuenta aqu&iacute;.</a></span>
            </div>
        </form>

    </div>

    <script src="https://kit.fontawesome.com/854b826ed2.js" crossorigin="anonymous"></script>
</body>

</html>