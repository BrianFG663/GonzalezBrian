ImputUno = []
ImputDos = []

 
function CargarUno() {

    ImputUno.push(Number(document.getElementById("ImputNumberOne").value))
    document.getElementById("ImputNumberOne").value = ""
    console.log(ImputUno)

    if (ImputUno.length == 3){
        document.getElementById('ButtonOne').disabled = true;
    } 

}

function CargarDos(Personajes) {
    ImputDos.push(Number(document.getElementById("ImputNumberTwo").value))
    document.getElementById("ImputNumberTwo").value = ""
    console.log(ImputDos)

    if (ImputDos.length == 3){
        document.getElementById('ButtonTwo').disabled = true;
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
}
