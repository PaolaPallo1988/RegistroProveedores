// CIERRE DE SESION AL PASAR 20MNTS TIEMPO DETERMINADO DE INACTIVIDAD
function idleLogout() {
    var t;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer;  // catches touchscreen presses as well      
    window.ontouchstart = resetTimer; // catches touchscreen swipes as well 
    window.onclick = resetTimer;      // catches touchpad clicks as well
    window.onkeypress = resetTimer;   
    window.addEventListener('scroll', resetTimer, true); // improved; see comments

    function yourFunction() {
        // your function for too long inactivity goes here
        //alert('Te estaremos redireccionando a www.web-de-destino.com en 5 segunditos');
          swal({
              title: 'AUTOCIERRE DE SESION POR INACTIVIDAD ',
              text: 'Redirecting...',
              icon: 'error',
              timer: 20000,
              dangerMode: true,
          })
          .then(() => {
            location.href="../vistas/cerrar_pagina.php";
          })  
        }
    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(yourFunction, 1000);  // time is in milliseconds
        console.log("sesion activa  ");
    } 
}
idleLogout();
