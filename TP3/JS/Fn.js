ImputUno = [];
ImputDos = [];
Personajes = [];
 
function CargarUno() {
    let auxiliar = Number(document.getElementById("ImputNumberOne").value); 
    let autenticacion = true;

    for (i=0; i<ImputDos.length; i++) {    
        if (auxiliar == ImputDos[i]){
            alert("Valor ya ingresado intente con otro");
            autenticacion = false;
        }
    }

    for (i=0; i<ImputUno.length; i++){
        if(auxiliar == ImputUno[i]){
            alert("Valor ya ingresado intente con otro");
            autenticacion = false;
        } 
    }

    if (autenticacion == true) {
        if (Number(document.getElementById("ImputNumberOne").value) > 0) {
            if (Number(document.getElementById("ImputNumberOne").value) < 826) {

                ImputUno.push(Number(document.getElementById("ImputNumberOne").value));
                document.getElementById("ImputNumberOne").value = "";
                console.log(ImputUno);

                    if (ImputUno.length == 3){
                        document.getElementById('ButtonOne').disabled = true;
                    }

            }
            else {
                alert("The Rick and Morty API solo cuenta con 826 personajes disponibles, por favor ingrese un numero mas bajo.");
            }
        }
        else {
            alert("No se puede ingresar un numero menor o igual a cero.");
        }
    }
}

function CargarDos() {
    let auxiliar = Number(document.getElementById("ImputNumberTwo").value);
    let autenticacion = true;

    for (i=0; i<ImputUno.length; i++) {    
        if (auxiliar == ImputUno[i]){
            alert("Valor ya ingresado intente con otro");
            autenticacion = false;
        }
    }

    for (i=0; i<ImputDos.length; i++){
        if(auxiliar == ImputDos[i]){
            alert("Valor ya ingresado intente con otro");
            autenticacion = false;
        } 
    }

    if (autenticacion == true) {
        if (Number(document.getElementById("ImputNumberTwo").value) > 0) {

            if (Number(document.getElementById("ImputNumberTwo").value) < 826) {

                ImputDos.push(Number(document.getElementById("ImputNumberTwo").value));
                document.getElementById("ImputNumberTwo").value = "";
                console.log(ImputDos);

                if (ImputDos.length == 3){
                    document.getElementById('ButtonTwo').disabled = true;
                }

            }
            else {
                alert("The Rick and Morty API solo cuenta con 826 personajes disponibles, por favor ingrese un numero mas bajo.");
            }
        }
        else {
            alert("No se puede ingresar un numero menor a cero.");
        }
    }
}   


function BuscarPersonaje() {
    
    let Personajes = ImputUno.concat(ImputDos);
    let contadorbotonbuscar = 0;
    

    if (Personajes.length != 6) {
        alert("Debe ingresar 6 numeros");
    }
    else{
        contadorbotonbuscar++;

        fetch ("https://rickandmortyapi.com/api/character/"+Personajes)
            .then(Response => Response.json())
            .then(data =>{
                for (i=0; i<data.length; i++){
                    for (j=0; j<ImputUno.length; j++) {
                        if(data[i].id == ImputUno[j]){
                            document.getElementById("ImagenesUno").innerHTML += 
                            `<img src="${data[i].image}" alt="">`
                        }

                        if(data[i].id == ImputDos[j]){
                            document.getElementById("ImagenesDos").innerHTML += 
                            `<img src="${data[i].image}" alt="">`
                        }
                    }
                }
            })

            .catch(error => {
                document.getElementById("error").innerHTML =
                    `<div class= "ErrorCatch">
                        <img src="/Practicas/Parcialito/CSS/Imagenes/error-icon-4.png" class="ImageError">
                        <p>${error}</p>
                    </div>`
            })



            if (contadorbotonbuscar != 0){
                document.getElementById('Buscar').disabled = true;
            }
    }
}