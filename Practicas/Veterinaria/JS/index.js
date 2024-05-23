class Animales {
    constructor(name,edad,color,peso,nombre_dueño){    
        this.name = name
        this.nombre_dueño = nombre_dueño
        this.edad = edad
        this.color = color 
        this.peso = peso
    }
}

class Perro extends Animales {
    constructor(name,edad,color,peso,nombre_dueño,raza){
        super(name,edad,color,peso,nombre_dueño)
        this.raza = raza
    }
}

class Gato extends Animales {
    constructor(name,edad,color,peso,nombre_dueño,raza){
        super(name,edad,color,peso,nombre_dueño)
        this.raza = raza
    }
}

class Aves extends Animales {
    constructor(name,edad,color,peso,nombre_dueño,plumaje){
        super(name,edad,color,peso,nombre_dueño)
        this.plumaje = plumaje
    }
}

class Otros extends Animales {
    constructor(name,edad,color,peso,raza,otro){
        super(name,edad,color,peso)
        this.otro = otro
        this.raza = raza
    }
}

function tipoAnimal() {
    let valor = Number(document.getElementById("SelecAnimal").value)

    switch(valor) {
        case 1 :{
            document.getElementById("Inputs").innerHTML =
            `<input type="text" id="Nombre-Dueño" placeholder="Nombre del dueño:">
             <input type="text" id="Nombre" placeholder="Nombre:">
             <input type="text" id="Edad" placeholder="Edad:">
             <input type="text" id="Raza" placeholder="Raza:">
             <input type="text" id="Color" placeholder="Color:">
             <input type="text" id="Peso" placeholder="Peso:">
             <button id="SubirInfo" onclick="subirValores()">Subir informacion</button>`
             valor = null

        break;
        }

        case 2:{
            document.getElementById("Inputs").innerHTML =
            `<input type="text" id="Nombre-Dueño" placeholder="Nombre del dueño:">
             <input type="text" id="Nombre" placeholder="Nombre:">
             <input type="text" id="Edad" placeholder="Edad:">
             <input type="text" id="Raza" placeholder="Raza:">
             <input type="text" id="Color" placeholder="Color:">
             <input type="text" id="Peso" placeholder="Peso:">
             <button id="SubirInfo" onclick="subirValores()">Subir informacion</button>`
             valor = null

        break;
        }

        case 3:{
            document.getElementById("Inputs").innerHTML =
            `<input type="text" id="Nombre-Dueño" placeholder="Nombre del dueño:">
             <input type="text" id="Nombre" placeholder="Nombre:">
             <input type="text" id="Edad" placeholder="Edad:">
             <input type="text" id="Plumaje" placeholder="Plumaje:">
             <input type="text" id="Color" placeholder="Color:">
             <input type="text" id="Peso" placeholder="Peso:">
             <button id="SubirInfo" onclick="subirValores()">Subir informacion</button>`
             valor = null

        break;
        }

        case 4:{
            document.getElementById("Inputs").innerHTML =
            `<input type="text" id="Nombre-Dueño" placeholder="Nombre del dueño:">
             <input type="text" id="Animal" placeholder="Animal:"> 
             <input type="text" id="Nombre" placeholder="Nombre:">
             <input type="text" id="Edad" placeholder="Edad:">
             <input type="text" id="Color" placeholder="Color:">
             <input type="text" id="Peso" placeholder="Peso:">
             <button id="SubirInfo" onclick="subirValores()">Subir informacion</button>`
             valor = null

        break;
        }
    }
}

var contador = 0

function subirValores() {
    let valor = Number(document.getElementById("SelecAnimal").value)
    contador++
    
    if (contador == 1){
        switch(valor) {
            case 1:{

                const perro = new Perro(
                    document.getElementById("Nombre").value,
                    document.getElementById("Edad").value,
                    document.getElementById("Color").value,
                    document.getElementById("Peso").value,
                    document.getElementById("Nombre-Dueño").value,
                    document.getElementById("Raza").value
                )

                document.getElementById("Informacion_mascotas").innerHTML =
                `<div class="Mascota">Perro</div>
                <div class="Mascota">${perro.nombre_dueño}</div>
                <div class="Mascota">${perro.name}</div>
                <div class="Mascota">${perro.raza}</div>
                <div class="Mascota">${perro.edad}</div>
                <div class="Mascota">${perro.color}</div>
                <div class="Mascota">${perro.peso}</div>
                <div class="Mascota">-</div>`

                document.getElementById("Nombre").value = "";
                document.getElementById("Edad").value = "";
                document.getElementById("Color").value = "";
                document.getElementById("Peso").value = "";
                document.getElementById("Nombre-Dueño").value = "";
                document.getElementById("Raza").value = "";
            break;
            }

            case 2:{

                const gato = new Gato(
                    document.getElementById("Nombre").value,
                    document.getElementById("Edad").value,
                    document.getElementById("Color").value,
                    document.getElementById("Peso").value,
                    document.getElementById("Nombre-Dueño").value,
                    document.getElementById("Raza").value
                )

                document.getElementById("Informacion_mascotass").innerHTML =
                `<div class="Mascota">Gato</div>
                <div class="Mascota">${gato.nombre_dueño}</div>
                <div class="Mascota">${gato.name}</div>
                <div class="Mascota">${gato.raza}</div>
                <div class="Mascota">${gato.edad}</div>
                <div class="Mascota">${gato.color}</div>
                <div class="Mascota">${gato.peso}</div>
                <div class="Mascota">-</div>`

                document.getElementById("Nombre").value = "";
                document.getElementById("Edad").value = "";
                document.getElementById("Color").value = "";
                document.getElementById("Peso").value = "";
                document.getElementById("Nombre-Dueño").value = "";
                document.getElementById("Raza").value = "";
            break;
            }

            case 3:{

                const ave = new Aves(
                    document.getElementById("Nombre").value,
                    document.getElementById("Edad").value,
                    document.getElementById("Color").value,
                    document.getElementById("Peso").value,
                    document.getElementById("Nombre-Dueño").value,
                    document.getElementById("Plumaje").value
                )

                document.getElementById("Informacion_mascotas").innerHTML =
                `<div class="Mascota">Ave</div>
                <div class="Mascota">${ave.nombre_dueño}</div>
                <div class="Mascota">${ave.name}</div>
                <div class="Mascota">-</div>
                <div class="Mascota">${ave.edad}</div>
                <div class="Mascota">${ave.color}</div>
                <div class="Mascota">${ave.peso}</div>
                <div class="Mascota">${ave.plumaje}</div>`

                document.getElementById("Nombre").value = "";
                document.getElementById("Edad").value = "";
                document.getElementById("Color").value = "";
                document.getElementById("Peso").value = "";
                document.getElementById("Nombre-Dueño").value = "";
                document.getElementById("Plumaje").value = "";
            break;
            }

            case 4:{

                const otro = new Otros(
                    document.getElementById("Nombre").value,
                    document.getElementById("Edad").value,
                    document.getElementById("Color").value,
                    document.getElementById("Peso").value,
                    document.getElementById("Nombre-Dueño").value,
                    document.getElementById("Plumaje").value
                )

                document.getElementById("Informacion_mascotas").innerHTML =
                `<div class="Mascota">${otro.otro}</div>
                <div class="Mascota">${otro.nombre_dueño}</div>
                <div class="Mascota">${otro.name}</div>
                <div class="Mascota">${otro.raza}</div>
                <div class="Mascota">${otro.edad}</div>
                <div class="Mascota">${otro.color}</div>
                <div class="Mascota">${otro.peso}</div>
                <div class="Mascota">-</div>
                </div>`

                document.getElementById("Nombre").value = "";
                document.getElementById("Edad").value = "";
                document.getElementById("Color").value = "";
                document.getElementById("Peso").value = "";
                document.getElementById("Nombre-Dueño").value = "";
                document.getElementById("Animal").value = "";
            break;
            }
        }
    }
    else{
        switch(valor) {
            case 1:{

                const perro = new Perro(
                    document.getElementById("Nombre").value,
                    document.getElementById("Edad").value,
                    document.getElementById("Color").value,
                    document.getElementById("Peso").value,
                    document.getElementById("Nombre-Dueño").value,
                    document.getElementById("Raza").value
                )

                document.getElementById("Contenedor-Informacion-Mascotas").innerHTML +=
                `<div id="Informacion_mascotas">
                    <div class="Mascota">Perro</div>
                    <div class="Mascota">${perro.nombre_dueño}</div>
                    <div class="Mascota">${perro.name}</div>
                    <div class="Mascota">${perro.raza}</div>
                    <div class="Mascota">${perro.edad}</div>
                    <div class="Mascota">${perro.color}</div>
                    <div class="Mascota">${perro.peso}</div>
                    <div class="Mascota">-</div>
                </div>`

                document.getElementById("Nombre").value = "";
                document.getElementById("Edad").value = "";
                document.getElementById("Color").value = "";
                document.getElementById("Peso").value = "";
                document.getElementById("Nombre-Dueño").value = "";
                document.getElementById("Raza").value = "";
            break;
            }

            case 2:{

                const gato = new Gato(
                    document.getElementById("Nombre").value,
                    document.getElementById("Edad").value,
                    document.getElementById("Color").value,
                    document.getElementById("Peso").value,
                    document.getElementById("Nombre-Dueño").value,
                    document.getElementById("Raza").value
                )

                document.getElementById("Contenedor-Informacion-Mascotas").innerHTML +=
                `<div id="Informacion_mascotas">
                    <div class="Mascota">Gato</div>
                    <div class="Mascota">${gato.nombre_dueño}</div>
                    <div class="Mascota">${gato.name}</div>
                    <div class="Mascota">${gato.raza}</div>
                    <div class="Mascota">${gato.edad}</div>
                    <div class="Mascota">${gato.color}</div>
                    <div class="Mascota">${gato.peso}</div>
                    <div class="Mascota">-</div>
                </div>`

                document.getElementById("Nombre").value = "";
                document.getElementById("Edad").value = "";
                document.getElementById("Color").value = "";
                document.getElementById("Peso").value = "";
                document.getElementById("Nombre-Dueño").value = "";
                document.getElementById("Raza").value = "";
            break;
            }

            case 3:{

                const ave = new Aves(
                    document.getElementById("Nombre").value,
                    document.getElementById("Edad").value,
                    document.getElementById("Color").value,
                    document.getElementById("Peso").value,
                    document.getElementById("Nombre-Dueño").value,
                    document.getElementById("Plumaje").value
                )

                document.getElementById("Contenedor-Informacion-Mascotas").innerHTML +=
                `<div id="Informacion_mascotas">
                    <div class="Mascota">Ave</div>
                    <div class="Mascota">${ave.nombre_dueño}</div>
                    <div class="Mascota">${ave.name}</div>
                    <div class="Mascota">-</div>
                    <div class="Mascota">${ave.edad}</div>
                    <div class="Mascota">${ave.color}</div>
                    <div class="Mascota">${ave.peso}</div>
                    <div class="Mascota">${ave.plumaje}</div>
                </div>`

                document.getElementById("Nombre").value = "";
                document.getElementById("Edad").value = "";
                document.getElementById("Color").value = "";
                document.getElementById("Peso").value = "";
                document.getElementById("Nombre-Dueño").value = "";
                document.getElementById("Plumaje").value = "";
            break;
            }

            case 4:{

                const otro = new Otros(
                    document.getElementById("Nombre").value,
                    document.getElementById("Edad").value,
                    document.getElementById("Color").value,
                    document.getElementById("Peso").value,
                    document.getElementById("Nombre-Dueño").value,
                    document.getElementById("Plumaje").value
                )

                document.getElementById("Contenedor-Informacion-Mascotas").innerHTML +=
                `<div id="Informacion_mascotas">
                    <div class="Mascota">${otro.otro}</div>
                    <div class="Mascota">${otro.nombre_dueño}</div>
                    <div class="Mascota">${otro.name}</div>
                    <div class="Mascota">${otro.raza}</div>
                    <div class="Mascota">${otro.edad}</div>
                    <div class="Mascota">${otro.color}</div>
                    <div class="Mascota">${otro.peso}</div>
                    <div class="Mascota">-</div>
                </div>`

                document.getElementById("Nombre").value = "";
                document.getElementById("Edad").value = "";
                document.getElementById("Color").value = "";
                document.getElementById("Peso").value = "";
                document.getElementById("Nombre-Dueño").value = "";
                document.getElementById("Animal").value = "";
            break;
            }
        }
    }

}