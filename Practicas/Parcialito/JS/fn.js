var array = []


function BuscarNumero() {
    array.push(Number(document.getElementById("NumeroInput").value))
    console.log(array)

    let numeroMaximo = array[
        0
    ]
    if (array.length == 10) {
        alert("Numero maximo alcanzado")
        for (i = 1; i < array.length; i++) {
            if (array[i] > numeroMaximo) {
                numeroMaximo = array[i]
            }
        }
        ObtenerId(numeroMaximo)
    }
}



function ObtenerId(numeroMaximo) {
    fetch("https://rickandmortyapi.com/api/character/" + [numeroMaximo])
        .then(res => res.json())
        .then(dataRickAndMorty => {
            console.log(dataRickAndMorty)

            fetch("https://randomuser.me/api/")
                .then(res => res.json())
                .then(dataRandomUser => {
                    console.log(dataRandomUser)
                    if (dataRickAndMorty.species == "Human") {

                        document.getElementById("BoxOne").innerHTML =
                            `<img class="ImageRickAndMorty" src="${dataRickAndMorty.image}">`

                        document.getElementById("BoxTwo").innerHTML =
                            `<img class="ImageRandomUser" src="${dataRandomUser.results[0].picture.large}">`
                    }

                    if (dataRickAndMorty.species != "Human") {
                        document.getElementById("BoxOne").innerHTML =
                            `<img class="ImageRandomUser" src="${dataRandomUser.results[0].picture.large}">`

                        document.getElementById("BoxTwo").innerHTML =
                            `<p class="">Nombre completo: ${dataRandomUser.results[0].name.first}&nbsp;${dataRandomUser.results[0].name.last}</p>
                         <p class="">Email: ${dataRandomUser.results[0].email}</p>
                         <p class="">Fecha de naciemiento: ${dataRandomUser.results[0].dob.date.slice(0, 10)}</p>
                         <p class="">Edad: ${dataRandomUser.results[0].dob.age}</p>`
                    }

                })

                .catch(error => {
                    document.getElementById("error").innerHTML =
                        `<div class= "ErrorCatch">
                    <img src="/CSS/Imagenes/error-icon-4.png" class="ImageError">
                    <p>${error}</p>
                </div>`
                })
        })

        .catch(error => {
            document.getElementById("error").innerHTML =
                `<div class= "ErrorCatch">
                <img src="/CSS/Imagenes/error-icon-4.png" class="ImageError">
                <p>${error}</p>
            </div>`
        })
}



