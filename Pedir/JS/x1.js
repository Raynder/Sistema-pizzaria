function x1_mudaFoto1(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/
    console.log(foto)
    x = "img1x/"+foto+".png";
    document.getElementById("esquerdo").src = x;
}
function x1_aux(situacao){
    var vez = 0
    if(situacao == 1){
        if(typeof intervalo_aux != 'undefined'){
            clearInterval(intervalo_aux)
        }
        intervalo_aux = setInterval(function (){
            valor = document.getElementById('esquerdo').height
            document.getElementById('isab1').style.height = valor+'px'
            if(vez == 0){
                doc = document.getElementById('centro')
                img = doc.getElementsByTagName('img')
                for(var i = 0; i < img.length; i++){
                    img[i].style.opacity = '1'
                }
                vez = 1
            }
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
//INICIO DAS PIZZAS DE 2 SABORES

function x2_mudaFoto1(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/
    console.log(foto)
    x = "img2x/"+foto+"1.png";
    document.getElementById("esquerdo").src = x;
}
function x2_mudaFoto2(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/
    console.log(foto)
    x = "img2x/"+foto+"2.png";
    document.getElementById("direito").src = x;
}
function x2_aux(situacao){
    var vez = 0
    if(situacao == 1){
        if(typeof intervalo_aux != 'undefined'){
            clearInterval(intervalo_aux)
        }
        intervalo_aux = setInterval(function (){
            valor = document.getElementById('direito').height
            document.getElementById('isab1').style.height = valor+'px'
            document.getElementById('isab2').style.height = valor+'px'
            if(vez == 0){
                doc = document.getElementById('centro')
                img = doc.getElementsByTagName('img')
                for(var i = 0; i < img.length; i++){
                    img[i].style.opacity = '1'
                }
                vez = 1
            }
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
//INICIO DAS PIZZAS DE 3 SABORES

function x3_mudaFoto1(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/

    var x = "img3x/"+foto+"1.png";
    document.getElementById("direito").src = x;
}
function x3_mudaFoto2(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/

    var x = "img3x/"+foto+"2.png";
    document.getElementById("baixo").src = x;
}
function x3_mudaFoto3(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/

    var x = "img3x/"+foto+"3.png";
    document.getElementById("esquerdo").src = x;
}
function x3_aux(situacao){
    var vez = 0
    if(situacao == 1){
        if(typeof intervalo_aux != 'undefined'){
            clearInterval(intervalo_aux)
        }
        intervalo_aux = setInterval(function (){
            valor = document.getElementById('direito').height
            valor = valor / 2
            document.getElementById('isab1').style.height = valor+'px'
            document.getElementById('isab2').style.height = valor+'px'
            document.getElementById('isab3').style.height = valor+'px'
            if(vez == 0){
                doc = document.getElementById('centro')
                img = doc.getElementsByTagName('img')
                for(var i = 0; i < img.length; i++){
                    img[i].style.opacity = '1'
                }
                vez = 1
            }
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
function x3_conferir(pos){
    document.getElementById('func').value = "pedir_pizza"
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