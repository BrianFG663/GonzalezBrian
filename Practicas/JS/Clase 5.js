function ObtenerID () {
   const rymid = document.getElementById("number").value;
    fetch ("https://rickandmortyapi.com/api/character/" + rymid)
        .then(res => res.json())
        .then(data => {
            const Informacion = document.getElementById("Informacion")
            Informacion.innerHTML = `
             <div class="Cotainer">
             ${data.status}
             <img src="${data}" alt="">
             </div>
            `
        })

    .catch (error => {
        console.error("error", error)
    })
}