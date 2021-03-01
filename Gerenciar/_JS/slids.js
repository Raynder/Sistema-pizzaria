function iniciar(){
    entrar_bandeja()
}
function entrar_bandeja(){
    var bandeja = document.getElementById('band')

    x = -800

    intervalo = setInterval(function(){
        if(x < 0){
            x = x + 50
            bandeja.style.left = x+'px'
        }
        else{
            clearInterval(intervalo)
        }
            
    }, 25)
}