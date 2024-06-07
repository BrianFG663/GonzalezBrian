
arrayletras = []
mayor = ""
mayorEdad = 0

function traerPersonajes(){
    fetch ("https://rickandmortyapi.com/api/character/1,2,3")
        .then(Res => Res.json())
        .then(dataRYM =>{

            for (i=0; i<dataRYM.length; i++){
                let name = dataRYM[i].name
                arrayletras.push(name.substr(0,1))
            }
            for (i=0; i < arrayletras.length; i++){
                
                if (mayor < arrayletras[i]){
                    mayor = arrayletras[i]
                    index = i
                }
            }
            
            dataMayor = dataRYM[index]
        })

    fetch ("https://randomuser.me/api/?results=3")
        .then(Res => Res.json())
        .then(data =>{
            for(i=0; i < data.results.length; i++){
                edadrm = data.results[i].dob.age

                if (mayorEdad < edadrm){
                    personajeMayor = data.results[i]
                }
            }

        Personaje = {
            nombre : personajeMayor.name.first,
            foto : dataMayor.image,
            edad : personajeMayor.dob.age,
            genero : dataMayor.gender,
            ciudad : personajeMayor.location.city
        }

        console.log(Personaje)
    })


}

