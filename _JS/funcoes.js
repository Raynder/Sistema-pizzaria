function adicionarbeb(beb) {
    Swal.fire({
        title: 'Deseja adicionar um(a) '+beb+'?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, adicionar!'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Feito!',
                'Sua bebida foi adicionada!',
                'success'
            )
            add_bebida(beb);
        }
    })

}
function finalizar_pedido(total) {
    Swal.fire({
        title: 'O total do seu pedido foi de R$'+total+'.00.<br>Deseja finalizar?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, finalizar!'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Deseja que a bebida seja servida...',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Agora.',
                cancelButtonText: 'Junto com a pizza.'
            }).then((result) => {
                if (result.value) {
                    
                }
                else{

                }
                Swal.fire(
                    'Feito!',
                    'Seu pedido ficara pronto em torno de 30 minutos!',
                    'success'
                )
                form = document.getElementById('band')
                form.reset()
                document.getElementById('final').value = 'ok'
                form.submit()
            })
        }
    })

}