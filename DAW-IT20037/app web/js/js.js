

let z1 = document.getElementById("z1");
let zona1 = document.getElementById("zona1");
let z2 = document.getElementById("z2");
let zona2 = document.getElementById("zona2");
let z3 = document.getElementById("z3");
let zona3 = document.getElementById("zona3");
let z4 = document.getElementById("z4");
let zona4 = document.getElementById("zona4");
let z5 = document.getElementById("z5");
let zona5 = document.getElementById("zona5");

z1.addEventListener('click', function(element){
    zona1.classList.toggle("activado");
})
z2.addEventListener('click', function(element){
    zona2.classList.toggle("activado");
})
z3.addEventListener('click', function(element){
    zona3.classList.toggle("activado");
})
z4.addEventListener('click', function(element){
    zona4.classList.toggle("activado");
})
z5.addEventListener('click', function(element){
    zona5.classList.toggle("activado");
})