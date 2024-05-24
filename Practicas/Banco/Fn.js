class Cliente{
    constructor(name,lastname,fecha_nacimiento){
        this.name = name;
        this.lastname = lastname;
        this.fecha_nacimiento = fecha_nacimiento.split("/",3);
    }

    set _verificarEdad(fecha_nacimiento){
       
    }
    
}
class Cuenta_Bancaria extends Cliente{
    constructor(name,lastname,fecha_nacimiento,saldo,id_cliente){
        super(name,lastname,fecha_nacimiento)
        this.saldo = saldo;
        this.id_cliente = id_cliente;
    }

    set _setSalario(saldo){
        date = new Date

        mayor = false

        if (this.fecha_nacimiento[2] > 18){
            mayor=true
        }

        if (this.fecha_nacimiento[2] == 18){

        }
    }
}

