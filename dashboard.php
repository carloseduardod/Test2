<?php
//verfica se o usuario esta logado
session_start();
require('connect/connect.php');
?>
<?php
if (isset($_SESSION['user_'])):
    $adm = $_SESSION['user_'][1];
    $nome = $_SESSION['user_'][0];
else:
    echo "<script>window.location = 'erro.html'</script>";
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="imagens/loja.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/style.css" rel="stylesheet">
    <title>Dashboard - <?php echo $nome;?></title>
</head>
<body>
    <main>
    <header><!--Links--> 
    <ul id='menu'>
        <li id='logo'><a href="dashboard.php">BESTSTORE</a></li>
        <li><a href="#"><img src="imagens/configuracao.png" id='hamburg'></a></li>
         <?php if ($adm == 1):
        endif;
            ?>
        <li><a href="dashboard.php">Olá, <?php echo $nome;?></a></li>
        <li><a href='enter/logout.php'>Sair<a></li>
                    <li><a href='carrinho.php'>Carrinho</a></li>
        
           
            <?php if ($adm == 1): 
        echo "<li><a href='relatorio.php'  target='_blank'>Relatorio de vendas</a></li>"; 
        echo "<li><a href='Adm/addProdutos.php'>Adicionar Produtos</a></li>"; 
        echo "<li><a href='Adm/ProdutosReg.php'>Produtos Registrados</a></li>";
        echo "<li><a href='Adm/registros.php'>Usuarios Registrados</a></li>";
        ?>
    
    <?php else:
    //Usuario comum
    
    endif;
    ?>
    </ul>
    </header>
    <div id="divisoria"></div> 
    <section>
    <h5><img src='imagens/beststore2.png'></h5>
    
    
    
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
                <a href="carrinho.php?cd=<?php echo $currentProdutos['id_produto']?>" id='carrinho' >Adicionar ao carrinho</a>
            </div> 
     
    </div>
    <?php endfor; ?> <!-- Produtos -->
    </section>
    </main>
    <footer></footer>
    <script src="Scripts/2.js"></script> 
   

</body>
</html>