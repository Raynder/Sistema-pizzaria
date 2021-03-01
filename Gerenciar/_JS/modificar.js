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

function acao_pedido(cliente, acao){
    form = document.getElementById('band')
    form.reset()
    document.getElementById('acao').value = acao
    document.getElementById('cliente_acao').value = cliente
    form.submit()
}

function prepara(cliente){
    imprimir_pedido(cliente)
}
function termina(cliente){
    pedido_pronto(cliente)
}