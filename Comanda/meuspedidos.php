<?php
require_once "../config.php";
session_start();
$total_a_pagar = 0;

if(isset($_SESSION['cliente']) && !empty($_SESSION['cliente'])){
    
}
else{
    header("location:/index.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ERP</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/bandeja.css">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        
        <script src="jquery.2.1.3.min.js"></script>

        
	</head>

    <style>
    
        .bloco_img {
            width: 15%;
        }
        #band{
            left: 0;
        }
        .bt {
            width: 40%;
            text-align: center;
        }
    </style>
    <script>
        setInterval(function(){
            mostrar()
        },200000)

        function mostrar(){
            $.ajax
            ({
                type: 'POST',
                dataType: 'html',
                url: 'mostrar.php',

                data: {},
                success: function(msg){
                    $('#result').html(msg);
                }
            });
        }
    </script>

	<body>
        <nav>
            <div class="row" id="">
                <a href=""><img src="../img/icone.png" class="icone" width="80" height="60"></a>
            </div>
        </nav>

		<div class="container-fluid text-center">
			<div class="row">
					<div class="col-lg-12 corpo">

                        <form action="" method="post" id="band">
                            <div id="opc1">
                                <h1>Meus Pedidos</h1>

                                <span id="result"></span>

                                <input type="text" style="display:none" id="slide" value="aguardando">
                            </div>  
                        </form>

                        

					</div>
			</div>

        </div>
        <script>
            window.onload = mostrar()
        </script> 
	</body>
</html>