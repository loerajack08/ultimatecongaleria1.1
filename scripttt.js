function compartirFacebook(event) {
    event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
    var url = encodeURIComponent(window.location.href); // Obtener la URL de la página actual
    console.log(url); // Mostrar la URL en la consola
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, '_blank');
}

function compartirWhatsApp() {
    event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
    var url = encodeURIComponent(window.location.href); // Obtener la URL de la página actual
    window.open('https://api.whatsapp.com/send?text=' + url, '_blank');
}

// Asignar el evento de clic al botón de Facebook
document.getElementById('facebookBtn').addEventListener('click', compartirFacebook);
document.getElementById('whatsappBtn').addEventListener('click', compartirWhatsApp);



