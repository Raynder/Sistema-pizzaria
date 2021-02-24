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