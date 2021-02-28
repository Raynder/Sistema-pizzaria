function mudaFoto1(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/

    var x = "_img3x/"+foto+"1.png";
    document.getElementById("direito").src = x;
}
function mudaFoto2(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/

    var x = "_img3x/"+foto+"2.png";
    document.getElementById("baixo").src = x;
}
function mudaFoto3(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/

    var x = "_img3x/"+foto+"3.png";
    document.getElementById("esquerdo").src = x;
}
function aux(situacao){
    if(situacao == 1){
        intervalo_aux = setInterval(function (){
            valor = document.getElementById('direito').height
            valor = valor / 2
            document.getElementById('isab1').style.height = valor+'px'
            document.getElementById('isab2').style.height = valor+'px'
            document.getElementById('isab3').style.height = valor+'px'
        },1000)
    }
    else{
        if(situacao == 2){
            console.log(situacao)
        }
        else{
            clearInterval(intervalo_aux)
        }
    }
}
function conferir(pos){
    if(pos == 1){
        sabor1 = document.getElementById('isab1').value
        sabor2 = document.getElementById('isab2').value
        sabor3 = document.getElementById('isab3').value

        if(sabor1 != " " && sabor2 != " " && sabor3 != " "){
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