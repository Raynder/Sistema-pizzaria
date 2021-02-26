var bandeja = document.getElementById('band')
var opc1 = document.getElementById('opc1')
var opc2 = document.getElementById('opc2')
var opc3 = document.getElementById('opc3')
var opc4 = document.getElementById('opc4')
var sabores = document.getElementById('sabores')
var tamanhos = document.getElementById('tamanhos')

function entrar_bandeja(){
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
    console.log('entrei aqui')

    x = 0
    func = 1

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
                tamanhos.style.display = "none"
                sabores.style.display = "none"
                if(pos == 0){
                    sabores.style.display = "block"
                    opc1.style.display = "block"
                    aux(1)
                }
                if(pos == 1){
                    aux(2)
                    tamanhos.style.display = "block"
                    opc2.style.display = "block"
                }
                if(pos == 2){
                    opc3.style.display = "block"
                }
                if(pos == 3){
                    opc4.style.display = "block"
                }
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
