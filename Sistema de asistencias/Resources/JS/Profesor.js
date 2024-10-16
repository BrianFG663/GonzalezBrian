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
            location.href = "crear-alumnos.php";
        break

        case 4:
            location.href = "tomar-asistencia.php";
        break

        case 5:
            location.href = "Materias-index.php";
        break

        case 6:
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
                title: "Asistencias registradas!",
                showConfirmButton: false,
                timer: 1500
              });
            
            setTimeout(() => {
                document.getElementById("formulario-asistencias").submit()
            }, 1600);

        }
      });

}

function formularioSalida(){

    Swal.fire({
        title: "¿Desea actualizar la asistencia?",
        showCancelButton: true,
        confirmButtonText: "actualizar",
      }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Asistencias actualizadas!",
                showConfirmButton: false,
                timer: 1500
              });
            setTimeout(() => {
                document.getElementById("formulario-salida").submit()
            }, 1600);

        }
      });
}

function formularioLlegada(){

    Swal.fire({
        title: "¿Desea marcar las llegadas?",
        showCancelButton: true,
        confirmButtonText: "Subir",
      }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Llegadas registradas!",
                showConfirmButton: false,
                timer: 1500
              });
            setTimeout(() => {
                document.getElementById("formulario-tarde").submit()
            }, 1600);

        }
      });
}

function formularioInscribirMateria(button){
    Swal.fire({
        title: "¿Desea inscribirse a esta materia?",
        showCancelButton: true,
        confirmButtonText: "Confirmar"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire("Se ha inscrito a la materia!", "", "success");

            Swal.fire({
                position: "center",
                icon: "success",
                title: "Se ha inscrito a la materia correctamente!",
                showConfirmButton: false,
                timer: 1500
            });
    
            setTimeout(() => {
                button.closest('form').submit();
            }, 1600);

        }
      });

}

function formularioInscribirInstituto(button) {
    Swal.fire({
        title: "¿Desea inscribirse a este instituto?",
        showCancelButton: true,
        confirmButtonText: "Confirmar"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Se ha inscripto al instituto correctamente!",
                showConfirmButton: false,
                timer: 1500
            });

            // Enviar el formulario al que pertenece el botón
            setTimeout(() => {
                button.closest('form').submit(); // Envía el formulario correspondiente
            }, 1600);
        }
    });
}

function formularioEliminarAsistencia(button) {
    Swal.fire({
        title: "¿Desea eliminar esta asistencia?",
        showCancelButton: true,
        confirmButtonText: "Confirmar"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Se ha inscripto al instituto correctamente!",
                showConfirmButton: false,
                timer: 1500
            });

            // Enviar el formulario al que pertenece el botón
            setTimeout(() => {
                button.closest('form').submit(); // Envía el formulario correspondiente
            }, 1600);
        }
    });
}

function formularioEliminarInstituto(button) {
  Swal.fire({
      title: "¿Desea quitar este instituto?",
      showCancelButton: true,
      confirmButtonText: "Confirmar"
  }).then((result) => {
      if (result.isConfirmed) {
          Swal.fire({
              position: "center",
              icon: "success",
              title: "Se ha quitado al instituto correctamente!",
              showConfirmButton: false,
              timer: 1500
          });

          // Enviar el formulario al que pertenece el botón
          setTimeout(() => {
              button.closest('form').submit(); // Envía el formulario correspondiente
          }, 1600);
      }
  });
}

function formularioEliminarAlumno(button) {
    Swal.fire({
        title: "¿Desea quitar este alumno?",
        showCancelButton: true,
        confirmButtonText: "Confirmar"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Se ha eliminado el alumno correctamente!",
                showConfirmButton: false,
                timer: 1500
            });
            // Enviar el formulario al que pertenece el botón
            setTimeout(() => {
                button.closest('form').submit(); // Envía el formulario correspondiente
            }, 1600);
        }
    });
  }


function formularioAlumno(){
    nombre = document.getElementById("nombre-alumno").value
    apellido = document.getElementById("apellido-alumno").value
    dni = document.getElementById("dni-alumno").value

    if(dni !== ""){
        if(apellido !== ""){
            if(nombre !==""){
                if (!isNaN(dni) && !/\s/.test(dni)) {
                    if (/^[A-Za-z]+$/.test(nombre)) {
                        if (/^[A-Za-z]+$/.test(apellido)) {
                            Swal.fire({
                                title: "¿Desea inscribir al alumno?",
                                showCancelButton: true,
                                confirmButtonText: "Inscribir"
                              }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                  Swal.fire("Alumno inscrito!", "", "success");
                                  setTimeout(() => {
                                    document.getElementById("inscribir-alumno").submit();
                                }, 1000);
                                }
                              });
                        }else {
                            Swal.fire({
                                icon: "error",
                                title: "El apellido no permite caracteres especiales o numeros",
                            });
                        }
                    }else {
                        Swal.fire({
                            icon: "error",
                            title: "El nombre no permite caracteres especiales o numeros",
                        });
                    }
                    
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "El  DNI no permite caracteres especiales o letras",
                    });
                }

            }else{
                Swal.fire({
                    icon: "error",
                    title: "Por favor completa el formulario"
                });
            }
        }else{
            Swal.fire({
                icon: "error",
                title: "Por favor completa el formulario"
            });
        }
    }else{
        Swal.fire({
            icon: "error",
            title: "Por favor completa el formulario"
        });
    }
}

function formularioParametros(){
    Swal.fire({
        title: "¿Desea cambiar los parametros?",
        showCancelButton: true,
        confirmButtonText: "Inscribir"
      }).then((result) => {

        if (result.isConfirmed) {
          Swal.fire("Parametros cambiados!", "", "success");
          setTimeout(() => {
            document.getElementById("formulario-parametros").submit();
        }, 1000);
        }
      });
}

function formularioCalificaciones(){
    Swal.fire({
        title: "¿Desea subir calificaciones?",
        showCancelButton: true,
        confirmButtonText: "Inscribir"
      }).then((result) => {

        if (result.isConfirmed) {
          Swal.fire("Calificaciones subidas!", "", "success");
          setTimeout(() => {
            document.getElementById("formulario-calificaciones").submit();
        }, 1000);
        }
      });
}