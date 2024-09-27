function redireccion(valor){
    valor = Number(valor);

    switch(valor){
        case 1:
            location.href =  "Funciones-administrador/Agregar-materia.php";
        break

        case 2:
            location.href =  "Funciones-administrador/Agregar-profesor.php";
        break;

        case 3:
            location.href =  "Funciones-administrador/Agregar-instituto.php";
        break;

        case 4: 
            location.href =  "Funciones-administrador/Agregar-administrador.php";
        break;

        case 5:
            location.href =  "../editar-perfil.php";
        break;

        case 6:
            location.href =  "../index.php";
        break;

        case 7:
            location.href = '../Administrador-index.php';
        break;

        case 8:
            location.href = 'Administrador-index.php';
        break;

    }
}

function formularioMateria(valor){
    let nombre = document.getElementById("nombre_materia").value
    let descripcion = document.getElementById("descripcion_materia").value
    let numero_materia = document.getElementById("numero_materia").value

    const esNumero = /^\d+$/.test(numero_materia);

    if(nombre =="" && descripcion ==""){
        Swal.fire({
            icon: "error",
            title: "Complete el formulario por favor."
        });
    }

    if(nombre !== ""){
        if(descripcion !==""){
            if(esNumero){
                Swal.fire({
                    title: "Esta seguro de inscribir esta materia?",
                    showCancelButton: true,
                    confirmButtonText: "inscribir",
                    denyButtonText: `Cancelar`
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log("aaaaa")
                        document.getElementById("inscribir-materia").submit();
                    }
                });
            }else{
                Swal.fire({
                    icon: "error",
                    title: "El codigo de materia solo permite numeros"
                });
            }
        }else{
            Swal.fire({
                icon: "error",
                title: "La descripcion de la materia es obligatoria"
            });
        }
    }else{
        Swal.fire({
            icon: "error",
            title: "El nombre de materia obligatorio."
        });
    }

    if(valor == 1){
        
    }
}

function formularioInstituto(valor){
    let nombre = document.getElementById("nombre_instituto").value
    let direccion = document.getElementById("direccion_instituto").value
    let cue = document.getElementById("cue_instituto").value

    if(nombre !== ""){
        if(direccion !==""){
            if(cue !==""){
                Swal.fire({
                    title: "Desea agregar este instituto?",
                    showCancelButton: true,
                    confirmButtonText: "Agregar",
                    denyButtonText: `Cancelar`
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("inscribir-instituto").submit();
                    }
                });
            }else{
                Swal.fire({
                    icon: "error",
                    title: "El C.U.E de la institucion es obligatoria"
                });
            }

        }else{
            Swal.fire({
                icon: "error",
                title: "La descripcion de la materia es obligatoria"
            });
        }
    }else{
        Swal.fire({
            icon: "error",
            title: "El nombre de materia obligatorio."
        });
    }

    if(valor == 1){
        location.href = 'Administrador-index.php';
    }
}

function formularioProfesor(valor){
    let nombre = document.getElementById("nombre-profesor").value
    let apellido = document.getElementById("apellido-profesor").value
    let dni = document.getElementById("dni-profesor").value
    let mail = document.getElementById("correo-profesor").value
    let legajo = document.getElementById("legajo-profesor").value

    const comprobar_dni = /^\d+$/.test(dni);
    const comprobar_legajo = /^\d+$/.test(legajo);

    if(nombre !== ""){
        if(apellido !==""){
            if(dni !==""){
                if(mail !==""){
                    if(legajo !==""){
                        if(comprobar_dni){
                            if(comprobar_legajo){
                                Swal.fire({
                                    title: "Esta seguro de inscribir este profesor?",
                                    showCancelButton: true,
                                    confirmButtonText: "inscribir",
                                    denyButtonText: `Cancelar`
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        console.log("aaaaa")
                                        document.getElementById("inscribir-profesor").submit();
                                    }
                                });
                            }else{
                                Swal.fire({
                                    icon: "error",
                                    title: "El legajo solo permite numeros"
                                });
                            }
                        }else{
                            Swal.fire({
                                icon: "error",
                                title: "El DNI solo permite numeros"
                            });
                        }
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "El legajo es obligatorio"
                        });
                    }
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "El E-Mail es obligatorio"
                    });
                }
            }else{
                Swal.fire({
                    icon: "error",
                    title: "El DNI es obligatorio"
                });
            }

        }else{
            Swal.fire({
                icon: "error",
                title: "El apellido es obligatorio"
            });
        }
    }else{
        Swal.fire({
            icon: "error",
            title: "El nombre es obligatorio."
        });
    }

    if(valor == 1){
        location.href = 'Administrador-index.php';
    }
}

function formularioAdministrador(valor){
    let nombre = document.getElementById("nombre-administrador").value
    let apellido = document.getElementById("apellido-administrador").value
    let mail = document.getElementById("correo-administrador").value

    if(nombre !==""){
        if(apellido !==""){
            if(mail !==""){
                Swal.fire({
                    title: "Desea agregar este administrador?",
                    showCancelButton: true,
                    confirmButtonText: "Agregar",
                    denyButtonText: `Cancelar`
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("inscribir-administrador").submit();
                    }
                });
            }else{
                Swal.fire({
                    icon: "error",
                    title: "El E-Mail es obligatorio"
                });
            }
        }else{
            Swal.fire({
                icon: "error",
                title: "El apellido es obligatorio"
            });
        }
    }else{
        Swal.fire({
            icon: "error",
            title: "El nombre es obligatorio."
        });
    }
                   
                    

    if(valor == 1){
        location.href = 'Administrador-index.php';
    }
}

function EliminarAdmin(id) {
    Swal.fire({
        title: "¿Está seguro de eliminar este administrador?",
        text: "¡Esta acción no tiene vuelta atrás!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('eliminar-admin-' + id).submit(); // Cambia a 'eliminar-admin-' 
        }
    });
}

function editarPerfil(){

    
    let nombre = document.getElementById("nombre").value
    let apellido = document.getElementById("apellido").value
    let mail = document.getElementById("mail").value
    let contraseñaActual = document.getElementById("contraseña-actual").value
    let contraseñaNueva = document.getElementById("contraseña-nueva").value


    if(nombre !== ""){
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Se ha cambiado el nombre correctamente",
            showConfirmButton: false,
            timer: 1500
        });

        setTimeout(() => {
            document.getElementById("formulario-editar").submit();
        }, 1600);
    }

    if(apellido !== ""){
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Se ha cambiado el apellido correctamente",
            showConfirmButton: false,
            timer: 1500
        });

        setTimeout(() => {
            document.getElementById("formulario-editar").submit();
        }, 1600);
    }

    if(mail !== ""){
        document.getElementById("formulario-editar").submit();


    }

    if(contraseñaActual !== ""){
        document.getElementById("formulario-editar").submit();
    }
}

