<?php
require('connect/connect.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="imagens/loja.ico">
    <title>Home page</title>
</head>
<body>
    <main>
    <header><!--Links--> 
    
    <ul id='menu'>
        <li id='logo'><a href="index.php">BESTSTORE</a></li>
        <li><a href="enter/singIn.php">Sing in</a></li>
        <li><a href="enter/singUp.php">Sing up</a></li>
    </ul>

    </header>
    <div id="divisoria"></div>   
    <section>
    <h5><img src='imagens/beststore.png'></h5>

        
     
        <?php
        $query = $connect->prepare("SELECT * FROM produtos"); //verificando se existe no banco de dados;
        $query->execute();
        $produtos = $query->fetchAll(PDO::FETCH_ASSOC); 
        for ($i = 0; $i < sizeof($produtos);$i++): // sizeof = tamanho do array
            $currentProdutos = $produtos[$i];?>
        <div class='produtos'>
         <div class="produto-single">
                <img src="imagens/catalogo/<?php echo $currentProdutos ['arquivo']?>">
                <h4> <?php echo $currentProdutos ['nome_produto'] ?></h4>
                <p><?php echo $currentProdutos ['descricao_produto'] ?></p>
                <h3>R$ <?php echo $currentProdutos ['preco_produto'] ?></h3>
                <a href="enter/singin.php?cd=<?php echo $currentProdutos['id_produto']?>" id='carrinho' >Adicionar ao carrinho</a>
            </div>   
    </div>
    <?php endfor; ?> <!-- Produtos -->
    </section>
    
</main>
<footer>
        <p>&copyVendeTudoCorporation</p>
    </footer>
    
</body>
</html>