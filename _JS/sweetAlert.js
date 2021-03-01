function pedidofeito(qtd, valor) {
    if(valor == 1){
        horas = qtd / 6
        horas = ~~horas
        minutos = qtd % 6
        if(qtd >= 6){
            
            if(horas >= 1){
                if(minutos >= 1){
                    minutos = minutos*10
                    tempo = horas+' horas e '+minutos+' minutos'
                }
                else{
                    tempo = horas+' horas'
                }
            }
        }
        else{
            if(minutos >= 1){
                minutos = minutos*10
                tempo = +minutos+' minutos'
            }
            else{
                tempo = "sem tempo definido"
            }
        }
        console.log('entro aqui')
        Swal.fire({
            icon: 'sucess',
            title:  'Seu pedido foi salvo!<br>Ficara pronto em torno de '+tempo+'.',
            background: '#000',
        })
    }
    
}
function marksabor() {
    Swal.fire({
        icon: 'info',
        title: 'Escolha todos os sabores',
        background: '#dcab13',
    })
}
function alteracao_concluida() {
    Swal.fire({
        icon: 'sucess',
        title: 'Alteração concluida com sucesso!',
        background: '#dcab13',
    })
}
