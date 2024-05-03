ImputUno = []
ImputDos = []

 
function CargarUno() {

    if (Number(document.getElementById("ImputNumberOne").value) > 0) {

        if (Number(document.getElementById("ImputNumberOne").value) < 826) {

            ImputUno.push(Number(document.getElementById("ImputNumberOne").value))
            document.getElementById("ImputNumberOne").value = ""
            console.log(ImputUno)

                if (ImputUno.length == 3){
                    document.getElementById('ButtonOne').disabled = true;
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

function CargarDos(Personajes) {

    if (Number(document.getElementById("ImputNumberTwo").value) > 0) {

        if (Number(document.getElementById("ImputNumberTwo").value) < 826) {

            ImputDos.push(Number(document.getElementById("ImputNumberTwo").value))
            document.getElementById("ImputNumberTwo").value = ""
            console.log(ImputDos)

                if (ImputDos.length == 3){
                    document.getElementById('ButtonTwo').disabled = true;
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
    fetch ("https://rickandmortyapi.com/api/character/"+ImputUno+","+ImputDos)
        .then(Response => Response.json())
        .then(data =>{
            document.getElementById("ImagenesUno").innerHTML = 
            `<img src="${data[0].image}" alt="">
            <img src="${data[1].image}" alt="">
            <img src="${data[2].image}" alt="">`

            document.getElementById("ImagenesDos").innerHTML = 
            `<img src="${data[3].image}" alt="">
            <img src="${data[4].image}" alt="">
            <img src="${data[5].image}" alt="">`
        })

        .catch(error => {
            document.getElementById("error").innerHTML =
                `<div class= "ErrorCatch">
                    <img src="/Practicas/Parcialito/CSS/Imagenes/error-icon-4.png" class="ImageError">
                    <p>${error}</p>
                </div>`
        })
}
