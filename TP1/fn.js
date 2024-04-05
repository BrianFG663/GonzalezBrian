// Mostrar un elemento del array en particular
$frutas = ['Pera','Manzana','Frutilla','Mandarina','Banana'];

console.log($frutas[1])

console.log(' ')

//recorrer con un for el array

for (i=0; i < $frutas.length; i++) {
    console.log($frutas[i])
}

console.log(' ')

// fruta es un elemento (nombre de variable a eleccion)
$frutas.forEach(fruta => {
    console.log(fruta)
});

console.log(' ')

for (const fruta2 of $frutas) {
    if (fruta2 == 'Manzana') {
        console.log(fruta2)
    }
}