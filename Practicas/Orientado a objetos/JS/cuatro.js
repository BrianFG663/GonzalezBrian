class Persona{
    constructor(name,lastname){
    this.name = name
    this.lastname = lastname
    }

    getName(){

        return this.name
    }

    setName(name){
        this.name = name
    }
}

Brian = new Persona ("Brian","gonzalez")

console.log(Brian)
