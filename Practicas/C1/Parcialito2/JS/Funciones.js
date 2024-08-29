function buscarOrdenar(valor) {
    
    if (valor == "Local"){
        var url = "Personas.json"
    }

    if(valor == "Internet"){
        var url = "https://randomuser.me/api/?results=10"
    }

    fetch (url)
        .then(res => res.json())
        .then(data =>{
            var mayor = 0
            var contadorpersonas = 0;
            var contadormujeres = 0;
            var contadorhombres = 0;

            for (i=0; i < data.results.length; i++){
                contadorpersonas++

                if (data.results[i].gender == "female"){
                    contadormujeres ++
                    document.getElementById("Mujeres").innerHTML += 
                    `<div>Nombre: ${data.results[i].name.first} ${data.results[i].name.last}, edad: ${data.results[i].dob.age}</div>`
                }

                if (data.results[i].gender == "male"){
                    contadorhombres ++
                    document.getElementById("Hombres").innerHTML += 
                    `<div>Nombre: ${data.results[i].name.first} ${data.results[i].name.last}, edad: ${data.results[i].dob.age}</div>`
                }

                if (mayor < data.results[i].dob.age){
                    mayor = data.results[i].dob.age
                    var imagen = data.results[i].picture.large
                    var Nombre = data.results[i].name.first
                    var apellido = data.results[i].name.last
                }
            }

            if (url = "https://randomuser.me/api/?results=10"){
                document.getElementById("PersonaMayor").innerHTML =
                `<img src="${imagen}" alt="">
                 <div>${Nombre} ${apellido}</div>`
            }

            document.getElementById("Mujeres").innerHTML += 
            `<div>Cantidad de Mujeres = ${contadormujeres}</div>`

            
            document.getElementById("Hombres").innerHTML += 
            `<div>Cantidad de Hombres = ${contadorhombres}</div>`

            document.getElementById("ContenedorBoton").innerHTML += 
            `<div class="ContadorGral">Cantidad de personas = ${contadorpersonas}</div>`
        })
}