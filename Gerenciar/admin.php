<?php
require_once "../config.php";
session_start();

if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){
    $gerir = new Gerente();
    if($_SESSION['nome'] == "admin21"){
        
    }
    else{
        header("location:../pedir/index.php");
    }
}

else{
    header("location:../pedir/index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ERP</title>
		<link rel="stylesheet" type="text/css" href="../_css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../_css/style.css">
		<link rel="stylesheet" type="text/css" href="../_css/bandeja.css">
        <link rel="stylesheet" type="text/css" href="../_css/index.css">
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="_JS/sweetAlert.js"></script>

        <script src="_JS/slids.js" type="text/javascript"></script>
        <script src="_JS/modificar.js" type="text/javascript"></script>
        
	</head>

    <style>
    
        .bloco_img {
            width: 15%;
        }
    </style>

	<body>
        <nav>
            <div class="row" id="">
                <a href="admin.php"><img src="../_img/icone.png" class="icone" width="80" height="60"></a>
                <?php
                    if($_SESSION['nome'] == "admin21"){
                        $asp = '"';
                        echo("<a href='../pedir/1sabores.php' class='nav-link pg'>NOVO PEDIDO</a>
                        <a href='index.php' class='nav-link pg'>PEDIDOS</a>
                        ");
                    }
                ?>
            </div>
        </nav>

		<div class="container-fluid text-center">
			<div class="row">
					<div class="col-lg-12 corpo">
                        
                        <form action="" method="post" id="band">
                            
                        </form>

                        

					</div>
			</div>

        </div>
        
	</body>
</html>