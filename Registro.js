$(document).ready(function () {
    let newemployee_register = document.querySelector("#newemployee_register");

    let nombre = document.querySelector("#nombre");
    let telefono = document.querySelector("#telefono");
    let correo = document.querySelector("#correo");
    let contra = document.querySelector("#contra");
    let fecha_nacimiento = document.querySelector("#fecha_nacimiento");
    let rfc = document.querySelector("#rfc");
    let foto = document.querySelector("#foto");
    let usertype = document.querySelector("#usertype");

    let mostrar = document.querySelector(".mostrar");
    let ocultar = document.querySelector(".ocultar");

    newemployee_register.addEventListener("submit", function (e) {
        e.preventDefault();
        error = false;
        vacio = false;

        //Si el campo no esta vacio (True), valida que el input tenga informacion valida
        if (!validarLongitud(nombre, document.querySelector("#nombrevacio")))
            vacio = true;

        if (validarLongitud(telefono, document.querySelector("#telefonovacio"))) {
            if (telefono.value.length < 10)
                error = true
        }
        else
            vacio = true;

        if (validarLongitud(correo, document.querySelector("#correovacio")))
            error = validarCorreo(correo, document.querySelector("#errorcorreo"))
        else
            vacio = true;

        if (validarLongitud(contra, document.querySelector("#contravacio")))
            error = validarPass(contra, document.querySelector("#errorcontra"))
        else
            vacio = true;

        if (validarLongitud(fecha_nacimiento, document.querySelector("#fecha_nacimientovacio")))
            error = validarFecha(fecha_nacimiento, document.querySelector("#errorfecha_nacimiento"))
        else
            vacio = true;

        if (validarLongitud(rfc, document.querySelector("#rfcvacio")))
            error = validarPass(contra, document.querySelector("#errorcontra"))
        else
            vacio = true;

        if (validarLongitud(foto, document.querySelector("#fotovacio")))
            error = validarPass(contra, document.querySelector("#errorcontra"))
        else
            vacio = true;

        if (!error & !vacio) {
            $.ajax({
                type: "POST",
                url: "mvc/AgregarUsuario.php",
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData(this),
                success: function (resultado) {
                    let res = JSON.parse(resultado);
                    console.log(res)
                    if (res[0] === "1") {
                        document.querySelector("#ventana-modal").style.display = "block";
                        $(".modal").append("<div class='contenido-modal'><i class='fa-sharp fa-solid fa-circle-check'></i>" +
                            "<div class='aviso-modal'><p>Registrarse</p> <h2>Se ha registrado de forma satisfactoria</h2></div></div>");
                        setTimeout(function () {
                            $(".contenido-modal").remove();
                            document.querySelector("#ventana-modal").style.display = "none";
                            $('#newemployee_register').get(0).reset()
                            window.location.href = "IniciarSesion.php"
                        }, 2500)
                    } else {
                        document.querySelector("#ventana-modal").style.display = "block";
                        $(".modal").append("<div class='contenido-modal'><i class='fa-sharp fa-solid fa-circle-xmark'></i>" +
                            "<div class='aviso-modal'><p>Intente de nuevo</p> <h2> " + res[1] + "</h2></div></div>");
                        setTimeout(function () {
                            $(".contenido-modal").remove();
                            document.querySelector("#ventana-modal").style.display = "none";
                            window.scrollTo({ top: 100, behavior: 'smooth' })
                        }, 6000)
                        if (res[0] === 1062) {
                            correo.style.borderColor = '#FF331F'
                            errorcorreo.style.display = "block";
                        }
                    }
                }
            })

        } else {
            document.querySelector("#ventana-modal").style.display = "block";
            $(".modal").append("<div class='contenido-modal'><img src='Recursos/logo.png'>" +
                "<div class='aviso-modal'><h2>No se pudo realizar el registro</h2><p>Verifique los datos ingresados</p></div></div>");
            setTimeout(function () {
                $(".contenido-modal").remove();
                document.querySelector("#ventana-modal").style.display = "none";
                window.scrollTo({ top: 100, behavior: 'smooth' })
            }, 3000)
        }
    })

    mostrar.addEventListener("click", function (e) {
        e.preventDefault()
        contra.type = "text"
        mostrar.style.display = "none"
        ocultar.style.display = "block"
    })
    ocultar.addEventListener("click", function (e) {
        e.preventDefault()
        contra.type = "password"
        mostrar.style.display = "block"
        ocultar.style.display = "none"
    })
})

//Esta función permite solo se tecleen letras válidas para el nombre
function Nombre(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-38-46-164";
    teclasEspeciales = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclasEspeciales = true; break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclasEspeciales || e.target.value.length >= 150) {
        return false;
    }
}

//La funcion retorna false cuando el campo esta vacio
function validarLongitud(campo, idvacio) {
    if (campo.value.length < 1) {
        idvacio.style.display = "block";
        return false;
    } else {
        idvacio.style.display = "none";
        return true;
    }
}

//Esta función permite solo se tecleen letras válidas para el correo
function Correo(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnopqrstuvwxyz1234567890.-_@";
    especiales = "8-37-38-46-164";
    teclasEspeciales = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclasEspeciales = true;
            break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclasEspeciales || e.target.value.length >= 50) {
        return false;
    }
}

function validarCorreo(correo, errorcorreo) {
    var regCorreo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var email = correo.value;

    if (!regCorreo.test(email)) {
        correo.style.borderColor = "#FF331F"
        errorcorreo.style.display = "block";
        return true;
    } else {
        errorcorreo.style.display = "none";
        correo.style.borderColor = "#ced4da"
        return false;
    }
}

//Esta función permite solo se tecleen letras válidas para la contraseña
function Contra(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnopqrstuvwxyz1234567890ñ@$!%*?&";
    especiales = "8-37-38-46-164";
    teclasEspeciales = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclasEspeciales = true;
            break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclasEspeciales || e.target.value.length >= 30) {
        return false;
    }
}

function validarPass(campo, errorpass) {
    var regPass = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    var pass = campo.value;

    if (!regPass.test(pass)) {
        campo.style.borderColor = "#FF331F";
        errorpass.style.display = "block";
        return true;
    } else {
        errorpass.style.display = "none";
        campo.style.borderColor = "#ced4da";
        return false;
    }
}

function Telefono(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    numeros = "1234567890";

    // Verificar si es número y no se ha superado la longitud máxima
    if (numeros.indexOf(teclado) == -1 || e.target.value.length >= 10) {
        return false;
    }
}

function RFC(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnopqrstuvwxyz1234567890";

    // Verificar si es número y no se ha superado la longitud máxima
    if (letras.indexOf(teclado) == -1 || e.target.value.length >= 13) {
        return false;
    }
}

function validarFecha(campo, iderror) {

    var fechaNacimiento = new Date(campo.value);
    var fechaHace17Anios = new Date();
    fechaHace17Anios.setFullYear(fechaHace17Anios.getFullYear() - 17);

    if (fechaNacimiento < fechaHace17Anios) {
        iderror.style.display = "none";
        return false;
    } else {
        iderror.style.display = "block";
        return true;
    }
}