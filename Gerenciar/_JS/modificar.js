function editar_pedido(cliente){
    form = document.getElementById('func')
    document.getElementById('ver').value = 'meusPedidos'
    document.getElementById('voltar').value = 'voltar'
    document.getElementById('cliente').value = cliente
    form.submit()
}
function remover_pedido(cliente){
    form = document.getElementById('func_interna')
    document.getElementById('apagar').value = cliente
    form.submit()
}

function acao_pedido(cliente, acao){
    form = document.getElementById('func_interna')
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
function finaliza(cliente, total, situ){
    document.getElementById("valor_total").value = total
    document.getElementById("total_pagar").value = total
    document.getElementById("cliente_pagador").value = cliente
    if(situ == 1){
        sair_bandeja(3)
    }
}
function alterar_valor(element){ 
    porcentagem = element.value
    total = document.getElementById("valor_total").value

    document.getElementById("total_pagar").value = total - (total / 100 * porcentagem)
}
function pagar_com(tipo){
    document.getElementById('valor_recebido_din').style.display = 'none'
    document.getElementById('valor_recebido_cart').style.display = 'none'
    document.getElementById(tipo).style.display = 'block'
}

function efetuar_pagamento(){
    form = document.getElementById("band")
    document.getElementById("valor_total").disabled = false
    document.getElementById("total_pagar").disabled = false
    form.submit()
}
function remover_desconto(cliente){
    form = document.getElementById("func_interna")
    document.getElementById("desconto_removido").value = cliente
    form.submit()
}