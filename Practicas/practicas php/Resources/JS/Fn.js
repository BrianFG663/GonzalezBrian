function verificarTipo(){
   let cliente = document.getElementById("check_cliente").checked;
   let empleado = document.getElementById("check_empleado").checked;

     if(cliente){
          document.getElementById("check_empleado").checked = false; 
          document.getElementById("empleado-cliente").innerHTML = 
          `<label for="numero">Numero de cliente:</label>
          <input type="number" name="numero" id="numero" placeholder="Numero de cliente...." required>`
     }

     if(empleado){
          document.getElementById("check_cliente").checked = false; 
          document.getElementById("empleado-cliente").innerHTML = 
          `<label for="numero">Numero de empleado:</label>
          <input type="number" name="numero" id="numero" placeholder="Numero de empleado...." required>`
     }

     if(!empleado && !cliente){
          document.getElementById("empleado-cliente").innerHTML = 
          ``
     }
}

function verficarFormulario(){
     let nombre = document.getElementById('nombre').value;
     let apellido = document.getElementById('apellido').value;
     let fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
     let dni = document.getElementById('dni').value;
     let localidad = document.getElementById('localidad').value;
     let provincia = document.getElementById('provincia').value;
     let telefono = document.getElementById('telefono').value;
     let mail = document.getElementById('mail').value;
     let sueldo = document.getElementById('sueldo').value;
     let numero = document.getElementById('numero').value;
     let contraseña = document.getElementById('contraseña').value
     let rcontraseña = document.getElementById('rcontraseña').value

     if(nombre !="" && apellido !="" && fecha_nacimiento !="" && dni !="" && localidad !="" && provincia !="" && telefono !="" && mail !="" && sueldo !="" && numero !="" && contraseña !="" && rcontraseña !=""){
          if(contraseña === rcontraseña){
               document.getElementById("formulario").submit();
          }else{
               alert("Las contraseña deben coincidir")
          }
            
     }else{
          alert("Debe llenar el formulario completo.")
     }
}

function transacciones(){
     location.href ="transacciones.php";
}