function verificarFormulario(){
    let valoremail = document.getElementById("login-nombre").value;
    let valorpass = document.getElementById("login-pass").value;
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    

    if(valoremail !==""){
        if(regex.test(valoremail)){
            if(valorpass !==""){
                document.getElementById("formulario-login").submit()
            }else{
                Swal.fire({
                    icon: "error",
                    text: "Muchas gracias!",
                    title: "Ingrese contraseña."
                });
            }
        }else{
            Swal.fire({
                icon: "error",
                text: "Muchas gracias!",
                title: "Ingrese correo electronico valido"
            });
        }
    }else{
        Swal.fire({
            icon: "error",
            text: "Muchas gracias!",
            title: "Ingrese correo."
        });
    }

    if(valoremail=="" && valorpass==""){
        Swal.fire({
            icon: "error",
            text: "Muchas gracias!",
            title: "Complete el formulario."
        });
    }
}