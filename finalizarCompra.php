<?php
// iniciando a sessão, pois precisamos pegar o cd do usuario logado para salvar na tabela de vendas no campo cd_cliiente
session_start();  

include 'connect/connect.php';


$data = date('Y-m-d');  // variavel que vai pegar a data do dia (ano mes dia -padrão do mysql)
$ticket = uniqid(333333);  // gerando um ticket com função uniqid(); 	gera um id unico    
$cd_user = $_SESSION['user_'][2];  //recebendo o codigo do usuário logado, nesta pagina o usuario ja esta logado pois, em do carrinho de compra

//// criando um loop para sessão carrinho q recebe o $cd e a quantidade
foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consulta = $connect->query("SELECT preco_produto FROM produtos WHERE id_produto='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $preco = $exibe['preco_produto'];
    $NomeConsulta = $connect->query("SELECT nome_produto FROM produtos WHERE id_produto='$cd'");
    $NomeExibe = $NomeConsulta->fetch(PDO::FETCH_ASSOC);
    $nome = $NomeExibe['nome_produto'];
    $qtdConsulta = $connect->query("SELECT quantidade_produto FROM produtos WHERE id_produto='$cd'");
    $qtdExibe = $qtdConsulta->fetch(PDO::FETCH_ASSOC);
    $qtd = $qtdExibe['quantidade_produto'];

    if($qtd > 0 ){
        $atualiza = $connect->query("UPDATE produtos SET quantidade_produto = quantidade_produto-$qnt WHERE id_produto='$cd'");
        $inserir = $connect->query("INSERT INTO tbl_venda(no_Ticket,id_code_User,id_produto,qt_produto,vl_item,dt_venda)  VALUES ('$ticket','$cd_user','$cd','$qnt','$preco','$data')");
       $_SESSION['msg'] = "<p id='align'>compra do produto($nome) realizada com sucesso </p><br>";
    } else {
        $_SESSION['msg'] =  "<p id='align'>compra nao realizada produto($nome) fora de estoque</p> <br>";
    }
}

include 'fim.php';


?>