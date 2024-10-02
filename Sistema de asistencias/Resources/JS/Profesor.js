function redireccion(valor){
    valor = Number(valor);

    switch(valor){
        case 1:
            location.href =  "profesores-index.php";
        break

        case 2:
            location.href =  "../profesores-index.php";
        break

    }
}

function formularioAsistencias(){
    document.getElementById("formulario-asistencias").submit()
}

function formularioInscribirMateria(){
    Swal.fire({
        title: "Desea inscribirse a esta materia?",
        showCancelButton: true,
        confirmButtonText: "Confirmar"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire("Saved!", "", "success");

            Swal.fire({
                position: "center",
                icon: "success",
                title: "Se ha inscripto a la materia correctamente!",
                showConfirmButton: false,
                timer: 1500
            });
    
            setTimeout(() => {
                document.getElementById("formulario-incribir-materia").submit();
            }, 1600);

        }
      });

}