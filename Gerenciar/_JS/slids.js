var bandeja = document.getElementById('band')

function iniciar(pos){
    pos += 1
    posslide = 'opc'+pos
    var slide = document.getElementById(posslide)
    slide.style.display = "block"

    entrar_bandeja()
}
function entrar_bandeja(){
    var bandeja = document.getElementById('band')

    x = -1100

    var intervalo = setInterval(function(){
        if(x < 0){
            x = x + 100
            bandeja.style.left = x+'px'
        }
        else{
            clearInterval(intervalo)
        }
            
    }, 25)
}
function sair_bandeja(part){
    var bandeja = document.getElementById('band')

    x = 0
    func = 1

    intervaloSair = setInterval(function(){
        if(x > -1100){
            bandeja.style.left = x+'px'
            x = x - 50 

        }
        else{
            if(part != 3){
                opc1.style.display = "block"
                opc4.style.display = "none"
                document.getElementById('slide').value = part
                var resp = mostrar(part)    
            }
            else{
                opc1.style.display = "none"
                opc4.style.display = "block"
                entrar_bandeja()
            }
            clearInterval(intervaloSair)
        }
           
    }, 25)
}
