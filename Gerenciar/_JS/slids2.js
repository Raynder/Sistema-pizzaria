var bandeja = document.getElementById('band')
var opc1 = document.getElementById('opc1')
var opc2 = document.getElementById('opc2')
var opc3 = document.getElementById('opc3')
var opc4 = document.getElementById('opc4')

function iniciar(pos){
    
    document.getElementById('opc1').style.display = "none"
    document.getElementById('opc2').style.display = "none"
    document.getElementById('opc3').style.display = "none"
    document.getElementById('opc4').style.display = "none"

    pos += 1
    posslide = 'opc'+pos
    var slide = document.getElementById(posslide)
    slide.style.display = "block"

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
function sair_bandeja(pos){
    var bandeja = document.getElementById('band')
    var opc1 = document.getElementById('opc1')
    var opc2 = document.getElementById('opc2')
    var opc3 = document.getElementById('opc3')
    var opc4 = document.getElementById('opc4')

    x = 0
    func = 1
    pos += 1

    intervalo = setInterval(function(){
        if(x > -800){
            bandeja.style.left = x+'px'
            x = x - 50 

        }
        else{
            if(func == 1){
                
                opc1.style.display = "none"
                opc2.style.display = "none"
                opc3.style.display = "none"
                opc4.style.display = "none"

                posslide = 'opc'+pos
                var slide = document.getElementById(posslide)
                slide.style.display = "block"
                
                intervalo2 = setInterval(function(){
                    if(x < 0){
                        x = x + 50
                        bandeja.style.left = x+'px'
                    }
                    else{
                        clearInterval(intervalo2)
                    }
                        
                }, 25)
                func = 2
            }
            else{
                clearInterval(intervalo)
            }
        }
           
    }, 25)
}
