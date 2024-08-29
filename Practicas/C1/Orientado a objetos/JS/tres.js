class Persona {
    constructor(name,lastname,gender,email,fecha_nacimiento){
        this.name = name
        this.lastname = lastname;
        this.gender = gender
        this.email = email
        this.fecha_nacimiento = fecha_nacimiento.split("-",3)
    }

    getEdad(){
        const fecha = new Date()
        const actual = [fecha.getFullYear(),fecha.getMonth(),fecha.getDate()];

        var mayor = false;

        // Sacar edad aproximada con año
        const anioactual = Number(fecha.getFullYear()) 
        const anionacimiento = Number(this.fecha_nacimiento[0])
        const numerouno = (anioactual - anionacimiento)

        const mesactual = Number(fecha.getMonth())
        const mesnacimiento = Number(this.fecha_nacimiento[1])

        const diaactual = Number(fecha.getDate())
        const dianacimiento = Number(this.fecha_nacimiento[2])

        if (numerouno == 18){
            if(mesnacimiento >= mesactual){
                if (dianacimiento >= diaactual){
                    mayor = true
                }
            }
        }

        if (numerouno > 18) {
            mayor = true
        }

        return mayor
    }

}

class Cliente extends Persona {
    constructor(name,lastname,gender,email,fecha_nacimiento,cuenta){
        super(name,lastname,gender,email,fecha_nacimiento)
        this.cuenta=cuenta
    }
}

class Empleado extends Persona {
    constructor(name,lastname,gender,email,fecha_nacimiento,legajo){
        super(name,lastname,gender,email,fecha_nacimiento)
        this.legajo=legajo
    }
}


function Buscar() {
    fetch ("https://randomuser.me/api/") 
        .then(Response => Response.json())
        .then(data =>{

            let persona = new Persona(data.results[0].name.first,data.results[0].name.last,data.results[0].gender,data.results[0].email,data.results[0].dob.date)
            let mayor = persona.getEdad()

            if (mayor == false){
                cliente = new Cliente(data.results[0].name.first,data.results[0].name.last,data.results[0].gender,data.results[0].email,data.results[0].dob.date,data.results[0].location.street.number)
                console.log("Cliente:")
                console.log(cliente)
                cliente.getEdad
            }
            
            else{
                console.log("Empleado:")
                empleado = new Empleado(data.results[0].name.first,data.results[0].name.last,data.results[0].gender,data.results[0].email,data.results[0].dob.date,data.results[0].location.street.number)
                console.log(empleado)
                empleado.getEdad()            
            }

        })


}