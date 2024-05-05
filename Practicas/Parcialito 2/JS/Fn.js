ImputUno = []
ImputDos = []
Personajes = []
 
function CargarUno() {

    if (Number(document.getElementById("ImputNumberOne").value) > 0) {

        if (Number(document.getElementById("ImputNumberOne").value) < 826) {

            ImputUno.push(Number(document.getElementById("ImputNumberOne").value))
            document.getElementById("ImputNumberOne").value = ""
            console.log(ImputUno)

                if (ImputUno.length == 3){
                    document.getElementById('ButtonOne').disabled = true;
                } 
                    for (i=0; i<ImputUno; i++){
                        for (j=0; j<ImputDos.length; j++) {
                            if (ImputUno[i]=ImputDos[j]){
                                alert("No se puede ingresar numeros de un mismo ")
                            }
                        }
                    }
            
        }
        else {
            alert("The Rick and Morty API solo cuenta con 826 personajes disponibles, por favor ingrese un numero mas bajo.")
        }
    }
    else {
        alert("No se puede ingresar un numero menor a cero.")
    }
}

function CargarDos() {

    if (Number(document.getElementById("ImputNumberTwo").value) > 0) {

        if (Number(document.getElementById("ImputNumberTwo").value) < 826) {

            ImputDos.push(Number(document.getElementById("ImputNumberTwo").value))
            document.getElementById("ImputNumberTwo").value = ""
            console.log(ImputDos)

                if (ImputDos.length == 3){
                    document.getElementById('ButtonTwo').disabled = true;
                }


                    for (i=0; i<ImputUno; i++){
                        for (j=0; j<ImputDos.length; j++) {
                            if (ImputUno[i]=ImputDos[j]){
                                alert("No se puede ingresar numeros de un mismo ")
                            }
                        }
                    }
        }
        else {
            alert("The Rick and Morty API solo cuenta con 826 personajes disponibles, por favor ingrese un numero menor")
        }
    }
    else {
        alert("No se puede ingresar un numero menor a cero.")
    }

}

function BuscarPersonaje() {
    let Personajes = ImputUno.concat(ImputDos)
    let medioarray = Personajes.length/2

    fetch ("https://rickandmortyapi.com/api/character/"+Personajes)
        .then(Response => Response.json())
        .then(data =>{
            for (i=0; i<data.length; i++){
                for (j=0; j<medioarray; j++) {
                    if(data[i].id == Personajes[j]){
                        document.getElementById("ImagenesUno").innerHTML += 
                        `<img src="${data[i].image}" alt="">`
                }
            }
    }

            for (i=0; i<data.length; i++){
                for (j=medioarray; j<Personajes.length; j++){
                    if(data[i].id == Personajes[j]){
                        document.getElementById("ImagenesDos").innerHTML += 
                        `<img src="${data[i].image}" alt="">`
                    }
                }
            }
        })
}



/* problemas a resolver:
    -no se puede agregar dos valores iguales /// usar funcion true false
    -bloquear boton una vez se hayan mostrado las imagenes /// contador
    -internet // ya esta
    -bloquear los imput
    -tener que cargar si o si 3 personajes en cada array //// if
*/