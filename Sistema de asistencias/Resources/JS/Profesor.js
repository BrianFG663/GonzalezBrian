function redireccion(valor){
    valor = Number(valor);

    switch(valor){
        case 1:
            location.href =  "profesores-index.php";
        break

        case 2:
            location.href =  "materias-index.php";
        break

    }
}

function formularioAsistencias(){
    document.getElementById("formulario-asistencias").submit()
}