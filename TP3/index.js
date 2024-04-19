function map (latitude,longitude) {

    var map = L.map('map').setView([latitude, longitude], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([latitude, longitude]).addTo(map);
}

function SearchUser () {
    const url = 'https://randomuser.me/api/'
    fetch (url)
    .then (response => response.json())
    .then (data => {

        const latitude = data.results[0].location.coordinates.latitude
        const longitude = data.results[0].location.coordinates.longitude
    
    document.getElementById("Informacion").innerHTML = 
        `
        <div class="BoxNames">
            <p>${data.results[0].name.first} &nbsp;</p>
            <p>${data.results[0].name.last}</p>
         </div>

        <div class="BoxLatLon">
            <p>${data.results[0].location.coordinates.latitude}</p>
            <p>${data.results[0].location.coordinates.longitude}</p>
         </div>

         <div>
            <img src="${data.results[0].picture.large}">
        </div>`

    map(latitude,longitude)
    })
}
