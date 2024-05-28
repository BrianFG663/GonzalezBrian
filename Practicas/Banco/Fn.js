class Cliente{
    constructor(name,lastname,fecha_nacimiento){
        this.name = name;
        this.lastname = lastname;
        this.fecha_nacimiento = fecha_nacimiento;
    }

    verificarEdad(){
        let mayor = false

        let nacimiento = this.fecha_nacimiento.split("-",3)
        let fecha = new Date
        const anioactual = Number(fecha.getFullYear()) 
        const anionacimiento = Number(nacimiento[0])
        const numerouno = (anioactual - anionacimiento)
 

        const mesactual = Number(fecha.getMonth()+1)
        const mesnacimiento = Number(nacimiento[1])

        const diaactual = Number(fecha.getDate())
        const dianacimiento = Number(nacimiento[2])

        if (numerouno == 18){
            if(mesnacimiento <= mesactual){
                if (dianacimiento <= diaactual){
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
class Cuenta_Bancaria extends Cliente{
    constructor(name,lastname,fecha_nacimiento,saldo,id_cliente){
        super(name,lastname,fecha_nacimiento)
        this.saldo = saldo;
        this.id_cliente = id_cliente;
    }

    set _setSalario(ingreso){
        let saldo = this.saldo + ingreso;
        let restante = 1000 - this.saldo;
        if (saldo>1000){
            document.getElementById("MostrarSaldo").innerHTML =
            `<div>Tiene un limite de $1000 en su cuenta</div>
             <div>su saldo actual es: $${this.saldo}</div>
             <div>Maximo disponible para ingresar: $${restante}</div>`
        }

        else{
            this.saldo += ingreso;
        }
    }

    set _retirarSaldo(debito){
        let saldo = this.saldo - debito

        if(saldo < 0){
            document.getElementById("MostrarSaldo").innerHTML =
            `<div>No se pudo realizar el retiro, pruebe con un monto menor.</div>
             <div>su saldo actual es: $${this.saldo}</div>`
        }
        else{
            this.saldo = this.saldo - debito
        }
    }

    get _getSaldo(){
        return this.saldo
    }
}

function subirInfo(){

    let nombre = document.getElementById("Nombre").value
    let apellido = document.getElementById("Apellido").value
    let fechanacimiento = String(document.getElementById("FechaNacimiento").value)

    console.log(typeof fechanacimiento)

    cuenta = new Cliente(nombre,apellido,fechanacimiento)
    fecha = cuenta.verificarEdad()
    
    if (fecha == true){
        cuenta = new Cuenta_Bancaria(nombre,apellido,fechanacimiento,500,1001)
        console.log(cuenta)
        document.getElementById("container").innerHTML =  
        `
        <div class="Pantalla">
            <p>informacion de cuenta</p>
            <div>
                <div class="NombrePantalla">Cuenta:${cuenta.name} ${cuenta.lastname}</div>
                <div id="MostrarSaldo"></div>
            </div>
        </div>
        
        <div>
            <input type="number" id="Ingresar-Retirar" placeholder="Ingrese monto">
            <div>
                <button onclick="ingresarDinero()">Ingresar</button>
                <button onclick="retirarDinero()">Debitar</button>
                <button onclick="mostrarSaldo()">Consultar saldo</button>
            </div>
        </div>`
    }
    else{
        console.log("Debe tener mas de 18 años para crear una cuenta bancaria.")
    }
}

function mostrarSaldo(){
    let salario = cuenta._getSaldo
    document.getElementById("MostrarSaldo").innerHTML =
    `Su saldo es $${salario}`
}

function ingresarDinero(){
    let ingreso = Number(document.getElementById("Ingresar-Retirar").value)
    document.getElementById("Ingresar-Retirar").value = ""
    cuenta._setSalario = ingreso
}

function retirarDinero(){
    let debito = Number(document.getElementById("Ingresar-Retirar").value)
    cuenta._retirarSaldo = debito
    document.getElementById("Ingresar-Retirar").value = ""
}

