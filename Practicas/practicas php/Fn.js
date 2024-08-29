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
}