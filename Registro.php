<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap_5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="Recursos/logo.png">
    <title>Registrarse</title>
</head>

<body>

    <div id="ventana-modal" class="modal"></div>

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
                <a href="Registro.php" class="nav-link active">
                    <i class="fa-solid fa-user-plus"></i> Registrarse
                </a>
            </li>
            <li class="nav-item">
                <a href="IniciarSesion.php" class="nav-link">
                    <i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesi&oacute;n
                </a>
            </li>
        </ul>
    </nav>

    <div class="main_container">
        <form id="newemployee_register" method="post">
            <div class="employee_data">
                <label class="form-label" for="name">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return Nombre(event);" tabindex="1">
                <p id="nombrevacio">* Campo vac&iacute;o.</p>
            </div>

            <div class="employee_data">
                <label class="form-label" for="telephone">N&uacute;mero de tel&eacute;fono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" onkeypress="return Telefono(event);" tabindex="2">
                <p id="telefonovacio">* Campo vac&iacute;o.</p>
            </div>

            <div class="employee_data">
                <label class="form-label" for="email">Correo electr&oacute;nico:</label>
                <input type="email" class="form-control" id="correo" onkeypress="return Correo(event);" name="correo" tabindex="3">
                <p id="correovacio">* Campo vac&iacute;o.</p>
                <p id="errorcorreo">* Ingrese un correo v&aacute;lido.</p>
            </div>

            <div class="employee_data">
                <label class="form-label" for="password">Contrase&ntilde;a:</label>
                <div class="input-con-boton">
                    <input type="password" class="form-control" id="contra" name="contra" onkeypress="return Contra(event);" tabindex="4">
                    <button class="mostrar" type="button"><i class="fa-solid fa-eye"></i></button>
                    <button class="ocultar" type="button"><i class="fa-solid fa-eye-slash"></i></button>
                </div>
                <p id="contravacio">* Campo vac&iacute;o.</p>
                <p id="errorcontra">* La contrase&ntilde;a debe de tener minimo 8 caracteres en los cuales debe
                    de haber 1 may&uacute;scula, 1 min&uacute;scula, 1 n&uacute;mero y 1 signo de
                    puntuaci&oacute;n.</p>
            </div>

            <div class="employee_data">
                <label class="form-label" for="confirmpassword">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" tabindex="5">
                <p id="fecha_nacimientovacio">* Campo vac&iacute;o.</p>
                <p id="errorfecha_nacimiento">* Debe ingresar una fecha v&aacute;lida.</p>
            </div>

            <div class="employee_data">
                <label class="form-label" for="confirmpassword">RFC:</label>
                <input type="text" class="form-control" id="rfc" name="rfc" onkeypress="return RFC(event);" tabindex="6">
                <p id="rfcvacio">* Campo vac&iacute;o.</p>
            </div>

            <div class="employee_data">
                <label class="form-label" for="confirmpassword">Fotograf&iacute;a:</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/png, image/jpeg" tabindex="7">
                <p id="fotovacio">* Campo vac&iacute;o.</p>
            </div>

            <div class="employee_data">
                <label class="form-label" for="confirmpassword">Seleccione un tipo de Usuario:</label>
                <select class="form-control" name="usertype" id="usertype" tabindex="8">
                    <option value="1">Empleado</option>
                    <option value="2">Ejecutivo de Cuentas</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Registrarse</button>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/854b826ed2.js" crossorigin="anonymous"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="Registro.js"></script>
</body>

</html>