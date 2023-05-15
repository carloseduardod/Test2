<?php
//verfica se o usuario esta logado
require('connect/connect.php');


?>
<?php
if (isset($_SESSION['user_'])):
    $nome = $_SESSION['user_'][0];
else:
    echo "<script>window.location = 'erro.html'</script>";
endif;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="styles/style.css" rel="stylesheet">
<link href="styles/formal.css" rel="stylesheet">
	
<style>

.navbar{
	margin-bottom: 0;
}
p#align{
            text-align:center;
        }
	
</style>
	

    <title>Dashboard - <?php echo $nome;?></title>
</head>
<body>
    <main>
    <header><!--Links--> 
    <ul id='menu'>
    <li id='logo'><a href="dashboard.php">BESTSTORE</a></li>
        <li><a href="#"><img src="imagens/configuracao.png" id='hamburg'></a></li>
        
        <li><a href="dashboard.php">Inicio</a></li>
    </ul>
    </header>

    <div id="divisoria"></div> 
    <section>
    <div id='efetuada'>
    <?php
        if(isset($_SESSION['msg'])):
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        else: echo "";
        endif; ?>    	
            
        <p id='res'>Numero de registro da compra:
        <strong> <?php echo $ticket; ?>	</strong>	 </p>	
			
        <p id='res'>Codigo do usuario : 
        <strong> <?php echo $cd_user?> </strong>
     </p>
    </div>
    <h5><img src='imagens/compra_sucesso.png'></h5>
</section>
</main>
    <footer></footer>
	
</body>
</html>

		