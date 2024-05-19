let pantalla = "";

function Numeros(valor) {
    let auxiliar = Number(valor);

    if (auxiliar >= 1 && auxiliar <= 9) {
        pantalla += String(auxiliar);
    } else if (auxiliar === 200) { // Borrar último dígito
        pantalla = pantalla.slice(0, -1);
    } else if (auxiliar === 201) { // Borrar toda la pantalla
        pantalla = "";
    }

    document.getElementById("pantalla").innerHTML = pantalla;
    console.log("Este es el valor: " + pantalla);
}

function Operaciones(valoroperador) {
    if (pantalla.length > 0) {
        pantalla += valoroperador;
        document.getElementById("pantalla").innerHTML = pantalla;
    }
}

function total() {
    try {
        let resultado = eval(pantalla.replace("x", "*"));
        pantalla = String(resultado);
        document.getElementById("pantalla").innerHTML = pantalla;
    } catch (e) {
        pantalla = "Error";
        document.getElementById("pantalla").innerHTML = pantalla;
    }
}
