const personaje = {
    "id": 140,
    "name": "Genital Washer",
    "status": "Alive",
    "species": "Human",
    "type": "",
    "gender": "Male",
    "origin": {
        "name": "Post-Apocalyptic Earth",
        "url": "https://rickandmortyapi.com/api/location/8"
    },
    "location": {
        "name": "Post-Apocalyptic Earth",
        "url": "https://rickandmortyapi.com/api/location/8"
    },
    "image": "https://rickandmortyapi.com/api/character/avatar/140.jpeg",
    "episode": [
        "https://rickandmortyapi.com/api/episode/23"
    ],
    "url": "https://rickandmortyapi.com/api/character/140",
    "created": "2017-12-27T18:47:44.566Z"
}

console.log('el personaje ' + personaje.name + 'esta ' + personaje.status)

document.getElementById("genital").innerHTML = ' el personaje ' + personaje.name + ' esta ' + personaje.status



/*const jugador = {
    "nombre" : "Nahuel",
    "apellido" : "Barrios",
    "apodo" : "Perrito",
    "edad": 28,
    "sueldo" : 1000,99,
    "clubes" :["san lorenzo","U catolica"],
    "activo" : true, 
}

console.log (jugador.clubes[0])

// console.log(personaje)


console.log(personaje.name)

console.log(personaje.origin.url)

*/