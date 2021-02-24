function entrar_bandeja(){
    bandeja = document.getElementById('band')
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
function sair_bandeja(){
    console.log('entrei aqui')
    bandeja = document.getElementById('band')
    opc1 = document.getElementById('opc1')
    opc2 = document.getElementById('opc2')
    sabores = document.getElementById('sabores')
    tamanhos = document.getElementById('tamanhos')

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
                tamanhos.style.display = "block"
                sabores.style.display = "none"
                opc2.style.display = "block"
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