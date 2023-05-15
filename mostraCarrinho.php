
<div class="container-fluid">
	
	<div class="row text-center" style="margin-top: 15px;">
		<h3>Carrinho de Compras</h3>
	</div>
	
	
	<?php
	
	$total = null; // variavel total que recebe valor nulo

    // criando um loop para sessão carrinho recebe o $cd e a quantidade
    foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consulta = $connect->query("SELECT * FROM produtos WHERE id_produto='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

    $livro = $exibe['nome_produto'];  // variável que recebe o livro
    $preco = number_format(($exibe['preco_produto']),2,',','.'); // variável que recebe o preço
    $total += $exibe['preco_produto'] * $qnt; // variável que recebe preço * quantidade
	
	?>
	
	
	
	
	
	<div class="row" style="margin-top: 15px;">
		
		
		
		<div class="col-sm-1 col-sm-offset-1" >
        <img src="imagens/catalogo/<?php echo $exibe['arquivo']?>" class="img-responsive">
		</div>
		
		
		<div class="col-sm-4">
			<h4 style="padding-top:20px"><?php echo $livro; ?></h4>
		</div>	
		
		
		<div class="col-sm-2">
			<h4 style="padding-top:20px">R$ <?php echo $preco; ?></h4>
		</div>		
		<div class="col-sm-2" style="padding-top:20px">
			<h4><?php echo $qnt; ?> </h4>
		</div>
		
		<div class="col-sm-1 col-xs-offset-right-1" style="padding-top:20px">
		
		<!--remove o item do carrinho pelo codigo -->
		<a href="removeCarrinho.php?cd=<?php echo $cd;?>">	
		<button class="btn btn-lg btn-block btn-danger">
		<span class="glyphicon glyphicon-remove"></span>		
		</button>
			</a>
		</div> 
				
	</div>	
	
	
	<?php } ?>