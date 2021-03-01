function editar_pedido(cliente){
    form = document.getElementById('func')
    document.getElementById('ver').value = 'meusPedidos'
    document.getElementById('voltar').value = 'voltar'
    document.getElementById('cliente').value = cliente
    form.submit()
}
function remover_pedido(cliente){
    form = document.getElementById('func')
    document.getElementById('ver').value = 'meusPedidos'
    document.getElementById('cliente').value = cliente
    form.submit()
}