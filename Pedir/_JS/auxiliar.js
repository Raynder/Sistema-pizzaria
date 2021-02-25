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

function conferir(pos){
    if(pos == 1){
        sabor1 = document.getElementById('isab1').value
        sabor2 = document.getElementById('isab2').value

        if(sabor1 != " " && sabor2 != " "){
            sair_bandeja(1)
        }
        else{
            alert("Escolha todos os sabores.")
        }
    }
    else{
        media = document.getElementById('media')
        grande = document.getElementById('grande')
        pequena = document.getElementById('pequena')

        if(pequena.checked || media.checked || grande.checked){
            form = document.getElementById('band')
            document.getElementById('ver').value = "meusPedidos"
            form.submit()
        }
        else{
            alert('O tamanho da pizza deve ser definido.')
        }
    }
}