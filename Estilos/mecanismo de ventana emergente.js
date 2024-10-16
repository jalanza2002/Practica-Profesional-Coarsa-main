// Función para abrir el pop-up
function abrirPopUp() {
    var ancho = 600;
    var alto = 400;
    var left = (screen.width - ancho) / 2;
    var top = (screen.height - alto) / 2;
    window.open('C:/xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/Pages/Terminos y Condiciones.php', 'Términos y Condiciones', 'width=' + ancho + ',height=' + alto + ',top=' + top + ',left=' + left);
}
// Obtener el checkbox de términos
var checkboxTerminos = document.getElementById("acepta_terminos");

// Obtener el botón de enviar solicitud
var btnEnviar = document.getElementById("Enviarbtn");

// Desactivar el botón de enviar si no está marcado el checkbox
checkboxTerminos.onclick = function() {
    if (!checkboxTerminos.checked) {
        btnEnviar.disabled = true;
    } else {
        btnEnviar.disabled = false;
    }
}