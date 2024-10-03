function redireccion(valor){
    valor = Number(valor);

    switch(valor){
        case 1:
            location.href =  "profesores-index.php";
        break

        case 2:
            location.href =  "../profesores-index.php";
        break

        case 3:
            location.href = "funciones-profesor/crear-alumnos.php";
        break

        case 4:
            location.href = "../alumnos-index.php";
        break

        case 5:
            location.href = "../Materias-index.php";
        break

    }
}

function formularioAsistencias(){

    Swal.fire({
        title: "¿Desea subir las asistencias?",
        showCancelButton: true,
        confirmButtonText: "Subir",
      }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Asistencias guardadas!",
                showConfirmButton: false,
                timer: 1500
              });
            
            setTimeout(() => {
                document.getElementById("formulario-asistencias").submit()
            }, 1600);

        }
      });

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

function formularioAlumno(){
    Swal.fire({
        title: "Desea inscribir al alumno?",
        showCancelButton: true,
        confirmButtonText: "Inscribir"
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          Swal.fire("Saved!", "", "success");
          setTimeout(() => {
            document.getElementById("inscribir-alumno").submit();
        }, 1000);
        }
      });
}