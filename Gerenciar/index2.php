<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <script src="JS/x1.js" type="text/javascript"></script>
    <script src="JS/auxiliar.js" type="text/javascript"></script>
    <script src="JS/modificar.js" type="text/javascript"></script>
    <script type="text/javascript" src="../JS/funcoes.js"></script>
    <script src="../JS/jquery.2.1.3.min.js"></script>
    
    <title>ERP</title>
</head>
<body>
    <script>
        setInterval(function(){
                var slide = document.getElementById('slide').value
                mostrar(slide, 1)
            },5000)

            function mostrar(part){
                ajaxLoad('aguardando', 'result')
                ajaxLoad('preparando', 'result2')
                ajaxLoad('pronto', 'result3')
                
            }

            function ajaxLoad(part, idElement) {
                $.ajax
                ({
                    type: 'POST',
                    dataType: 'html',
                    url: 'att_pedidos/mostrar.php',

                    data: {part: part},
                    success: function(msg){
                        $('#'+idElement).html(msg);
                    }
                });
            }

            function addClass(element){
                document.getElementById('nav-1').classList.remove('active')
                document.getElementById('nav-2').classList.remove('active')
                document.getElementById('nav-3').classList.remove('active')

                element.classList.add('active')
            }
    </script>

    <style>
        .pedido {
            height: 80px;
            padding: 10px;
            margin: 10px;
            border: solid 1px;
            border-radius: 10px;
        }
        .bloc{
            float: left;
        }
        .bloc_direit {
            float: right;
            margin-right: 5px;
        }
        .imge {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }
        p{
            margin: 0 0 0 10px;
            font-size: 10pt;
        }
        p.codigo {
            font-size: 12pt;
            font-weight: 600;
        }
        .dir{
            text-align: right;
        }
    </style>

    <div >
        <div class="row">
            <div class="col-sm-8">
            
                <nav class="nav nav-pills nav-justified">
                    <a id="nav-1" class="nav-item nav-link active" onclick="addClass(this)" href="#">Pedidos</a>
                    <a id="nav-2" class="nav-item nav-link" onclick="addClass(this)" href="#">Preparando</a>
                    <a id="nav-3" class="nav-item nav-link" onclick="addClass(this)" href="#">Pronto</a>
                </nav>

                <div class="pedido">

                    <div class="bloc imge">
                        <img src="../img/editar.png" width="40" height="40" alt="">
                    </div>
                    
                    <div class="bloc">
                        <p class="codigo">Codigo: 25A</p>
                        <p>Pizzas: 3</p>
                        <p>Bebidas: 2</p>
                    </div>
                    
                    <div class="bloc_direit">
                        <p class="codigo dir">Mesa: 5</p>
                        <p class="dir"><b>Nome:</b> Raynder Cardoso de Carvalho</p>
                        <p class="dir"><b>SubTotal:</b> R$70,00</p>
                    </div>

                </div>
                <div class="pedido">

                    <div class="bloc imge">
                        <img src="../img/editar.png" width="40" height="40" alt="">
                    </div>

                    <div class="bloc">
                        <p class="codigo">Codigo: 27B</p>
                        <p>Pizzas: 3</p>
                        <p>Bebidas: 1</p>
                    </div>
                    
                    <div class="bloc_direit">
                        <p class="codigo dir">Mesa: 4</p>
                        <p class="dir"><b>Nome:</b> Reisla Kelly Cardoso</p>
                        <p class="dir"><b>SubTotal:</b> R$62,00</p>
                    </div>

                </div>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
</body>
</html>