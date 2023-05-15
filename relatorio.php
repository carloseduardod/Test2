<?php
//verfica se o usuario esta logado

session_start();
require('connect/connect.php');
if (isset($_SESSION['user_'])):
    $adm = $_SESSION['user_'][1];
    $nome = $_SESSION['user_'][0];
else:
    echo "<script>window.location = '../erro.html'</script>";
endif;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/formal.css" rel="stylesheet">
    <link rel="shortcut icon" href="../imagens/loja.ico">
    <title>Registros</title>
</head>
<body>
    <main>
    <header><!--Links--> 
    <div id="print-content">
 <form>

  <input type="button" onclick="printDiv('print-content')" value="IMPRIMIR"/>
</form>

    <div id="divisoria"></div> 
    <?php if ($adm == 1): ?>
        <p id='volt'><a href='../dashboard.php'>Voltar<a></p>
    <table>
    <caption>REGISTRO DE VENDAS</caption>
        <thead>
            <tr><td class='cabeca'>registro venda|</td>
                <td class='cabeca'>id usuario|</td>
                <td class='cabeca'>nome produto|</td>
                <td class='cabeca'>id produto|</td>
                <td class='cabeca'>quantidade|</td>
                <td class='cabeca'>valor unitario|</td>
                <td class='cabeca'>valor total|</td>
                <td class='cabeca'>data de compra|</td>
            </tr>
        </thead>
        <tbody>
        
            <?php
                $query = $connect->prepare("SELECT * FROM tbl_venda"); //verificando se existe no banco de dados;
                $query->execute();
                $venda = $query->fetchAll(PDO::FETCH_ASSOC); 
                $query1 = $connect->prepare("SELECT * FROM users"); //verificando se existe no banco de dados;
                $query1->execute();
                $users = $query1->fetchAll(PDO::FETCH_ASSOC); 
                $query2 = $connect->prepare("SELECT * FROM produtos"); //verificando se existe no banco de dados;
                $query2->execute();
                $produtos = $query2->fetchAll(PDO::FETCH_ASSOC); 
                for ($i = 0; $i < sizeof($venda);$i++): // sizeof = tamanho do array
                    $currentUser = $users[$i];
                    $currentProduct = $produtos[$i];
                    $currentVenda = $venda[$i];
                    
            ?>
            <tr>
            <td><?php echo $currentVenda ['no_Ticket']?></td>
                <td><?php echo $currentVenda ['id_code_User']?></td>
                <td><?php echo $currentProduct ['nome_produto']?></td>
                <td><?php echo $currentProduct ['id_produto']?></td>
                <td><?php echo $currentVenda ['qt_produto']?></td>
                <td><?php echo $currentVenda ['vl_item']?></td>
                <td><?php echo $currentVenda ['vl_total_item']?></td>
                <td><?php echo $currentVenda ['dt_venda']?></td>
                
            </tr>   
            <?php endfor; ?>
        </tbody>
    </table>
    <?php endif; ?>
    <?php if ($adm == 0):
    echo "<h5><img src='../imagens/erro.png'></h5>";
    endif;
    ?>
    
    </main>
    <footer><p>&copyREGISTRODEVENDAS</p></footer>
    </div>
</body>
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.print();
        w.close();
    }
    </script>
</html>