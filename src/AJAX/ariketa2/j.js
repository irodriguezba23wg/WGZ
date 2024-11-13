function ajax() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", '../servidor/generaContenidos.php', true); 
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { 
            if (xhr.status === 200) { 
                const esaldiBerria = xhr.responseText;
                eguneratuTicker(esaldiBerria); 
            } else {
                console.error("Error en la solicitud: " + xhr.status);
            }
        }
    };
    xhr.onerror = function() {
        console.error("Error de red o problemas al realizar la solicitud.");
    };
    xhr.send(); 
}

function eguneratuTicker(text) {
    const ticker = document.getElementById("ticker");
    ticker.innerHTML = text;
}
