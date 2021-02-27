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