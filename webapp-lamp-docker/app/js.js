const zona = document.querySelectorAll('.zona');
console.log(zona);
const resultado = document.querySelector('.resultado');

zona.forEach(function(element){
    element.addEventListener('click', function(ele){
            element.classList.toggle('desactivado');
            resultado[i].classList.toggle('desactivado');
    })    
})

function lecturapis($apinsertada){
    const requestURL = $apinsertada
    const request = new XMLHttpRequest();
    request.open('GET', requestURL);
    request.responseType = 'json';
    request.send();
    request.onload = function(){
        const respuesta = request.response;

        function lectura(){
            const result = document.querySelectorAll('resultado');

            result.forEach(function(element){
                console.log(element);                
            });
        }
    }
}