function mudaFoto1(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/
    console.log(foto)
    x = "_img2x/"+foto+"1.png";
    document.getElementById("esquerdo").src = x;
}
function mudaFoto2(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/
    console.log(foto)
    x = "_img2x/"+foto+"2.png";
    document.getElementById("direito").src = x;
}
function aux(situacao){
    if(situacao == 1){
        intervalo_aux = setInterval(function (){
            valor = document.getElementById('direito').height
            document.getElementById('isab1').style.height = valor+'px'
            document.getElementById('isab2').style.height = valor+'px'
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