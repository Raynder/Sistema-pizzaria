<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ERP</title>
		<link rel="stylesheet" type="text/css" href="_css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="_css/style.css">
	</head>

	<body>
		<div class="container-fluid text-center">
			<div class="row">
					<div class="col-lg-12 corpo">

						<h1>RELATORIO</h1>
						<form action="" method="post">

							<div class="col-sm-12 abs">

							<div class="linha">
								<div class="col-sm-6 left rel">
									<p>Pizzas feitas hoje: 
									</p>
								</div>

								<div class="col-sm-6 right rel">
									<input type="text" name="qtd">
								</div>
							</div>

							<div class="linha">
								<div class="col-sm-6 left rel">
									<p>Pizzas feitas com a mussarela que estava aberta: 
									</p>
								</div>

								<div class="col-sm-6 right rel">
									<input type="text" name="antiga">
								</div>
							</div>

							<div class="linha">
								<div class="col-sm-6 left rel">
									<p>Pizzas feitas com a mussarela nova: 
									</p>
								</div>

								<div class="col-sm-6 right rel">
									<input type="text" name="nova">
								</div>
							</div>
								
							<input type="submit" value="Enviar">	

							</div>
						</form>
					</div>
			</div>

		</div>
	</body>
</html>
<?php

if(isset($_POST['qtd'])){

	$diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
	$data = date('Y-m-d');
	$diasemana_numero = date('w', strtotime($data));

	$day = $diasemana[$diasemana_numero]; //Pegar o dia da semana atual

	$array = array(
		":Q" => $_POST['qtd'],
		":QA" => $_POST['antiga'],
		":QN" => $_POST['nova'],
		":DT" => $day
	);

	$sql = new Sql();
	//Inserir tudo na tabela
	$sql->insere($array, "INSERT INTO vendas(qtd, qtd_antiga, qtd_nova, dia_sem) VALUES(:Q, :QA, :QN, :DT)");
}
	