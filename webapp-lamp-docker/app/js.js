const zona1 = document.getElementById('zona1');
const zona2 = document.getElementById('zona2');
const zona3 = document.getElementById('zona3');
const zona4 = document.getElementById('zona4');
const zona5 = document.getElementById('zona5');




zona1.addEventListener('click', function(){
    const r = document.getElementByClassName("resultado");
    const r1 = document.getElementByClassName("resultado1");
    r.classList.toggle("desactivado");
    r1.classList.toggle("desactivado");

})
zona2.addEventListener('click', function(ele){
    const r2 = document.getElementByClassName("resultado2");
    const r3 = document.getElementByClassName("resultado3");
    r2.classList.toggle("desactivado");
    r3.classList.toggle("desactivado");
})
zona3.addEventListener('click', function(ele){
    const r4 = document.getElementByClassName("resultado4");
    const r5 = document.getElementByClassName("resultado5");
    r4.classList.toggle("desactivado");
    r5.classList.toggle("desactivado");
})
zona4.addEventListener('click', function(ele){
    const r6 = document.getElementByClassName("resultado6");
    const r7 = document.getElementByClassName("resultado7");
    r6.classList.toggle("desactivado");
    r7.classList.toggle("desactivado");
})
zona5.addEventListener('click', function(ele){
    const r8 = document.getElementByClassName("resultado8");
    const r9 = document.getElementByClassName("resultado9");
    r8.desactivado.toggle("desactivado");
    r9.desactivado.toggle("desactivado");
})