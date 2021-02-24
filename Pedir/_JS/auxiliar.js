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