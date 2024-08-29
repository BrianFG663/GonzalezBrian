class Persona{
    constructor(nombre,apellido,fecha_nacimiento){ //metodo constructor pasa parametros
        this.nombre = nombre;
        this.apellido = apellido;
        this.fecha_nacimiento = fecha_nacimiento;
    }

    getEdad() {
        let anio = new Date()
        let edad = (anio.getFullYear() - this.fecha_nacimiento);

        return edad
        // console.log(`${this.nombre} tiene ${edad} años`)
    }

}


class Cliente extends Persona {
    cuenta = "";
}





const brian = new Persona ("Brian","Gonzalez",2001) // instanciar personas(objeto)


let edad = brian.getEdad()
console.log(`${brian.nombre} tiene ${edad} años`)