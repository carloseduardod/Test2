<?php
session_start();
require('connect/connect.php');
if (isset($_SESSION['user_'])):
$adm = $_SESSION['user_'][1];
$nome = $_SESSION['user_'][0];
else:
echo "<script>window.location = '../erro.html'</script>";
endif;
?>
<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">

	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="styles/style.css" rel="stylesheet">
    <title> Carrinho - <?php echo $nome;?></title>
	<style>
	
	.navbar{
		margin-bottom: 0;
	}
	
	
	</style>
	
	
	
</head>

<body>	
<main>
<header><!--Links--> 
    <ul id='menu'>
	<li id='logo'><a href="dashboard.php">BESTSTORE</a></li>
        <li><a href="#"><img src="imagens/configuracao.png" id='hamburg'></a></li>
       
        <li><a href="dashboard.php">Voltar</a></li>
    </ul>
    </header>
    <div id="divisoria"></div> 
	<?php
	
	
	// verificando se o codigo do produto NÃO está vazio
	if (!empty($_GET['cd'])) {
	
	// inserindo o código do produto na variável $cd_prod
	$cd_prod=$_GET['cd'];
	
	// se a sessão carrinho não estiver preenchida(setada)
	if (!isset($_SESSION['carrinho'])) {
		  // será criado uma sessão chamado carrinho para receber um vetor
		  $_SESSION['carrinho'] = array();
	}


	
	// se a variavel $cd_prod não estiver setado(preenchida)
	if (!isset($_SESSION['carrinho'][$cd_prod])) {
		
		// será adicionado um produto ao carrinho
		$_SESSION['carrinho'][$cd_prod]=1;
	}
	
	// caso contrario, se ela estiver setada, adicione novos produtos
	else {
		  $_SESSION['carrinho'][$cd_prod]+=1;

	}
		// incluindo o arquivo 'mostraCarrinho.php'
		include 'mostraCarrinho.php';
		
	} else {
		
		//mostrando o carrinho	vazio	
		include 'mostraCarrinho.php';
		
		
	}	
	
	?>
	
	<!-- exibindo o valor da variavel total da compra -->
	<div class="row text-center" style="margin-top: 15px;">
		<h1>Total: R$ <?php echo number_format($total,2,',','.'); ?> </h1>
	</div>
	
	
	<div class="row text-center" style="margin-top: 15px;">
		<a href="dashboard.php"><button class="btn btn-lg btn-primary">Continuar Comprando</button></a>
		<a href="finalizarCompra.php"><button class="btn btn-lg btn-success">Finalizar Compra</button></a>
	</div>

	
</div>
	
</main>
<footer></footer>
</body>
</html>