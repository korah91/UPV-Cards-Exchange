
function inactividad() {
    var t;
    window.onmousemove = resetTimer;    
    window.onclick = resetTimer;     // clicks del touchpad
    window.onscroll = resetTimer;    // movimiento con flechas
    window.onkeypress = resetTimer; //al presionar tecla

    function logout() {
        window.location.href = 'logout.php';
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout,5000);  // tiempo en milisegundos 60*1000
    }
}
inactividad();