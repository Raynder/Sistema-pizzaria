function alteracao_concluida() {
    Swal.fire({
        icon: 'success',
        title: 'Alteração concluida com sucesso!',
        background: '#dcab13',
    })
}
function imprimir_pedido(cliente){
    Swal.fire({
        title: 'Imprimir Pedido?',
        icon:   'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, imprimir!'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Impressão bem sucedida?',
                icon: 'question',
                showCancelButton: true,
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                denyButtonText: 'Não, repetir',
            }).then((result) => {
                if(result.isConfirmed){
                    Swal.fire({
                        title: 'O pedido do '+cliente+' esta sendo preparado!',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                    })
                    acao_pedido(cliente, 'preparar')
                }
                if(result.isDenied){
                    imprimir_pedido(cliente)
                }
            })
        }
        
    })
}
function pedido_pronto(cliente){
    Swal.fire({
        title: 'Pedido pronto?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
    }).then(result => {
        if(result.value){
            Swal.fire({
                icon: 'success',
                title: 'Pedido pronto!<br>Ja pode ser servido.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Sim'
            })
            acao_pedido(cliente, 'terminar')
        }
    })
}