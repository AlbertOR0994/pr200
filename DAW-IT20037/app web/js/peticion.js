
function peticion(){
    const http = new XMLHttpRequest();
    /* Declarar la URL */
    const requestURL = "http://localhost/clase/tareas/tareasdaw2/Proyecto%20ISLA%20MAGICA/app%20web/pages/api.php";
    // Creamos una solicitud con el constructor XMLHttpRequest();
    const request = new XMLHttpRequest();
    // Abrimos petición de entrada a la web
    request.open('GET', requestURL);
    // Indicamos que queremos o esperamos
    request.responseType = 'json';
    // Mandamos la solicitud
    request.send();
    // Definimos que hacemos con lo que nos devuelve.
    request.onload = function(){
        const mediciones = request.response;
        console.log(mediciones);
        const zona = mediciones[''];
        console.log(zona['z500']);
    }
}