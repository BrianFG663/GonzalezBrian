class Persona {
    constructor (nombre,apellido,dni,nacionalidad,fecha_naciemiento) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.dni = dni;
        this.nacionalidad = nacionalidad;
        this.fecha_naciemiento = fecha_naciemiento;
    }

    saludar(){
        console.log("hola " + this.nombre)
    }

}

class Cliente extends Persona {
    constructor(nombre,apellido,dni,nacionalidad,fecha_naciemiento,cuenta){
        super(nombre,apellido,dni,nacionalidad,fecha_naciemiento)
        this.cuenta = cuenta;
    }
}

let brian = new Cliente ("Brian","Gonzalez",43681175,"Argentino","08/11/2001",1001);

//brian.nombre = "Brian";
//brian.apellido = "Gonzalez";
//brian.dni = 43681175;
//brian.fecha_naciemiento = "08/11/2001";
//brian.nacionalidad = "Argentino";
//brian.cuenta = 1001;

console.log(brian);
brian.saludar()