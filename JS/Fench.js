let url = 'https://jsonplaceholder.typicode.com/users'
fetch(url)
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.log(error))

const mostrardata = (data) => {
    console.log(data)
    let body = ''
    for (let i = 0; i<data.length; i++) {
       body +=  <tr>
                    <td>${data[i].id}</td>
                    <td>${data[i].name}</td>
                    <td>${data[i].email}</td>
                </tr>
    }

    document.getElementById(data).innerHTML = body
}