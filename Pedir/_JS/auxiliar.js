function selec(valor){
    console.log(valor)
    document.getElementById('pequena').checked = 0
    document.getElementById('media').checked = 0
    document.getElementById('grande').checked = 0

    document.getElementById('idpequena').style.backgroundColor = "#fff"
    document.getElementById('idmedia').style.backgroundColor = "#fff"
    document.getElementById('idgrande').style.backgroundColor = "#fff"

    img = "id"+valor

    document.getElementById(valor).checked = 1
    document.getElementById(img).style.backgroundColor = "#b7e6b7"
}

function iniciar(valor){
    aux(valor)
    entrar_bandeja()
}

function mostrar_pedidos(){
    opc1.style.display = "none"
    sabores.style.display = "none"
    tamanhos.style.display = "none"
    opc2.style.display = "none"
    opc3.style.display = "block"
}
function pedir_mais(){  
    form = document.getElementById('band')
    form.reset()
    sair_bandeja(0)
}
function bebidas(){
    sair_bandeja(3)
}