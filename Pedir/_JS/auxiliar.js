function aux(){
    setInterval(function (){
        valor = document.getElementById('direito').height
        document.getElementById('isab1').style.height = valor+'px'
        document.getElementById('isab2').style.height = valor+'px'
    },1000)
}
function iniciar(){
    entrar_bandeja()
    aux()
}

function mostrar_pedidos(){
    opc1.style.display = "none"
    sabores.style.display = "none"
    tamanhos.style.display = "none"
    opc2.style.display = "none"
    opc3.style.display = "block"
}