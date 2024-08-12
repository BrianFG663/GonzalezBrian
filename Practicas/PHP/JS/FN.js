function verificaciones(){
    let terminos = document.getElementById("TyC").checked
    let user = document.getElementById("usuario").value
    let pass = document.getElementById("contraseña").value

    if (user != "" && pass != ""){
        if (terminos){
            document.getElementById("FormularioIngreso").submit()
        }else{
            alert("Debe aceptar los terminos y condiciones")
        }
    }else{
        alert("Debe ingresar usuario y contraseña")
    }


}


function verificarRegistro(){
    let nombre = document.getElementById("nombre").value
    let apellido = document.getElementById("apellido").value
    let fecha_nacimiento = document.getElementById("fecha_nacimiento").value
    let correo = document.getElementById("correo").value
    let contraseña = document.getElementById("contraseña").value
    let rcontraseña = document.getElementById("rcontraseña").value

    if (nombre !=""){
        if (apellido !=""){
            if(fecha_nacimiento !=""){
                if(correo !=""){
                    if(contraseña != ""){
                        if(contraseña == rcontraseña){
                            document.getElementById("formulario-registro").submit()
                            console.log("aaaa")
                        }else{
                            document.getElementById("comprobar_contraseñas").innerHTML =
                            `Las contraseñas deben coincidir.`
                        }
                    }else{
                        alert("Por favor ingrese una contraseña")
                    }
                }else{
                    alert("Por favor ingrese un correo electronico.")
                }
            }else{
                alert ("Es obligatorio ingresar su fecha de nacimiento.")       
            }
        }else{
            alert ("Es obligatorio ingresar al menos un apellido.")
        }
    }else{
        alert ("Es obligatorio ingresar al menos un nombre.")
    }

}
