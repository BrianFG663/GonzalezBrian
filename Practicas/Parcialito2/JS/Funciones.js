function buscarOrdenar() {
    fetch ("Personas.json")
        .then(res => res.json())
        .then(data =>{

            var contadorpersonas = 0;
            var contadormujeres = 0;
            var contadorhombres = 0;

            for (i=0; i < data.results.length; i++){
                contadorpersonas++

                if (data.results[i].gender == "female"){
                    contadormujeres ++
                    document.getElementById("Mujeres").innerHTML += 
                    `<div>Nombre: ${data.results[i].name.first} ${data.results[i].name.last}</div>`
                }

                if (data.results[i].gender == "male"){
                    contadorhombres ++
                    document.getElementById("Hombres").innerHTML += 
                    `<div>Nombre: ${data.results[i].name.first} ${data.results[i].name.last}</div>`
                }
            }

            document.getElementById("Mujeres").innerHTML += 
            `<div>Cantidad de Mujeres = ${contadormujeres}</div>`

            
            document.getElementById("Hombres").innerHTML += 
            `<div>Cantidad de Hombres = ${contadorhombres}</div>`

            document.getElementById("ContenedorBoton").innerHTML += 
            `<div class="ContadorGral">Cantidad de personas = ${contadorpersonas}</div>`
        })
}