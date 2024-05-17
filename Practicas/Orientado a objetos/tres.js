class Persona {
    constructor(name,lastname,gender,email,fecha_nacimiento){
        this.name = name
        this.lastname = lastname;
        this.gender = gender
        this.email = email
        this.fecha_nacimiento = fecha_nacimiento.split("-",3)
    }
    saludar(){
        return console.log("hola "+ this.name)
    }


}

class Cliente extends Persona {
    constructor(name,lastname,gender,email,fecha_nacimiento,cuenta){
        super(name,lastname,gender,email,fecha_nacimiento)
        this.cuenta=cuenta
    }

    getEdad(){

    }
}

class Empleado extends Persona {
    constructor(name,lastname,gender,email,legajo){
        super(name,lastname,gender,email)
        this.legajo=legajo
    }
}


function Buscar() {
    fetch ("https://randomuser.me/api/") 
        .then(Response => Response.json())
        .then(data =>{
            
            if (data.results[0].dob.age < 18){
                console.log("Cliente:")
                cliente = new Cliente(data.results[0].name.first,data.results[0].name.last,data.results[0].gender,data.results[0].email,data.results[0].dob.date,data.results[0].location.street.number)
                console.log(cliente)
            }
            else{
                console.log("Empleado:")
                empleado = new Empleado(data.results[0].name.first,data.results[0].name.last,data.results[0].gender,data.results[0].email,data.results[0].dob.date.slise(0,10),data.results[0].location.street.number)
                console.log(empleado)
            }

        })


}