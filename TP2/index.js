function ObtenerId () {
    const MiIduno = document.getElementById("IdUno").value;
    const MiIddos = document.getElementById("IdDos").value;
    fetch ("https://rickandmortyapi.com/api/character/"+ MiIduno +','+ MiIddos)
        .then (res => res.json())
        .then (data => {
        
            var genuno = data[0].gender
            var gendos = data[1].gender
            
            if (genuno == gendos) {
                document.getElementById("personajeuno").innerHTML =
                    `<div>${data[0].name}</div>`

                document.getElementById("personajedos").innerHTML =               
                    `<div>${data[1].name}</div>`

                document.getElementById("contimguno").innerHTML =
                    `<img class="imagen1" src="${data[0].image}">`

                document.getElementById("contcheck").innerHTML =
                `<img class="check" src="https://cdn.icon-icons.com/icons2/1880/PNG/96/iconfinder-check-4341282_120572.png">`

                document.getElementById("contimgdos").innerHTML =
                    `<img class="imagen2" src="${data[1].image}">`
            }
            else {
                document.getElementById("personajeuno").innerHTML =
                    `<div>${data[0].name}</div>`

                document.getElementById("personajedos").innerHTML =               
                    `<div>${data[1].name}</div>`

                document.getElementById("contimguno").innerHTML =
                    `<img class="imagen1" src="${data[0].image}">`

                document.getElementById("contcheck").innerHTML =
                `<img class="check" src="https://cdn.icon-icons.com/icons2/2621/PNG/96/gui_check_no_icon_157196.png">`

                document.getElementById("contimgdos").innerHTML =
                    `<img class="imagen2" src="${data[1].image}">`
            }
        })
}