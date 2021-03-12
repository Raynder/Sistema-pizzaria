function remover_pizza(id_pizza){
    form = document.getElementById('band')
    form.reset()
    document.getElementById('func').value = 'apagar'
    document.getElementById('valor_func').value = id_pizza
    document.getElementById('ver').value = "meusPedidos"
    form.submit()
}
function remover_bebida(id_bebida){
    form = document.getElementById('band')
    form.reset()
    document.getElementById('func').value = 'apagarbeb'
    document.getElementById('valor_func').value = id_bebida
    document.getElementById('ver').value = "meusPedidos"
    form.submit()
}
function editar_pizza(id_pizza){
    form = document.getElementById('band')
    form.reset()
    document.getElementById('func').value = 'editar'
    document.getElementById('valor_func').value = id_pizza
    sair_bandeja(1)
}
function add_bebida(bebida){
    form = document.getElementById('band')
    form.reset()
    document.getElementById('func').value = 'addbebida'
    document.getElementById('valor_func').value = bebida
    document.getElementById('ver').value = "meusPedidos"
    form.submit()
}