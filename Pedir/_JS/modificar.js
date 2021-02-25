function remover_pizza(id_pizza){
    form = document.getElementById('band')
    form.reset()
    document.getElementById('apagar').value = id_pizza
    document.getElementById('ver').value = "meusPedidos"
    form.submit()
}