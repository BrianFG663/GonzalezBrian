function map(latitude, longitude) {

    var map = L.map('map').setView([latitude, longitude], 2.5);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([latitude, longitude]).addTo(map);

}



function SearchUser() {
    const url = 'https://randomuser.me/api/'
    fetch(url)
        .then(response => response.json())
        .then(data => {

            const latitude = data.results[0].location.coordinates.latitud
            const longitude = data.results[0].location.coordinates.longitude

            document.getElementById("ContainMap").classList.add("MapContain")
            document.getElementById("map").classList.add("Mapstyle")
            document.getElementById("ContainInfo").classList.add("Informacion")
            document.getElementById("ContainProfile").classList.add("Profile")

            document.getElementById("ContainProfile").innerHTML =

                `<p>Fecha de nacimiento: ${data.results[0].dob.date.slice(0, 10)}</p>
                 <p>Edad:  ${data.results[0].dob.age} años</p>
                 <p>Ciudad de naciemiento: ${data.results[0].location.city}</p>
                 <p>Telefono Celular: ${data.results[0].phone}</p>`

            document.getElementById("ContainInfo").innerHTML =
                
                `<div class="BoxNames">
                    <p>Nombre y apellido: ${data.results[0].name.first} &nbsp;</p>
                    <p>${data.results[0].name.last}</p>
                </div>

                <div class="BoxLatLon">
                    <p>Latitud: (${data.results[0].location.coordinates.latitude}) &nbsp;</p>
                    <p>Longitud: (${data.results[0].location.coordinates.longitude})</p>
                </div>

                <div>
                    <img class="ProfileImage" src="${data.results[0].picture.large}">
                </div>`


            container = L.DomUtil.get('map');

            if (container != null) {
                container._leaflet_id = null;
            }

            map(latitude, longitude)
        })

        .catch (error => {
            document.getElementById("error").innerHTML =
            `<p class= "ErrorCatch">${error}</p>`
        })
}

