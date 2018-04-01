<?php
session_start();
require_once 'connect.php';

$pesquisa = $_POST['txtNome'];
$qtd = $_POST['txtQuant'];
$user = $_SESSION['name'];

if(!$pesquisa){
	$_SESSION['msg'] = "preencha todos os campos";
	header("Location: cadVendas.php");
}else{
	if(!$qtd){
		$_SESSION['msg'] = "preencha todos os campos";
		header("Location: cadVendas.php");
	}else{
		$sql = "SELECT * FROM produtos WHERE prod_nome ='$pesquisa'";
		$query = mysqli_query($conn, $sql);
		while($res = mysqli_fetch_assoc($query)){
			$id = $res['prod_id'];
			$nome = $res['prod_nome'];
			$quant = $res['prod_quant'];
			$valor = $res['prod_valor']; 
		}
		if($pesquisa == $pesquisa){
			if (!preg_match('/^[1-9][0-9]*$/', $qtd)) {
				$_SESSION['msg'] = "Quantidade declarada invalida.";
				header("Location: cadVendas.php");
			}else{
				$totValor = $valor * $qtd;
				if($qtd <= $quant){
					$quantAtual = $quant - $qtd;

					$ins = "INSERT INTO vendas
					 (vend_item, vend_quant, vend_valor,vend_user, prod_id, vend_valUnit, vend_date)
					  VALUES('$nome', '$qtd', '$totValor', '$user', '$id', '$valor', now())";
					$query_ins = mysqli_query($conn, $ins);

					$upd = "UPDATE produtos SET prod_quant ='$quantAtual' WHERE prod_id ='$id'";
					$query_upd = mysqli_query($conn, $upd);
					$_SESSION['msg'] = "Venda cadastrada com sucesso.";
					header("Location: cadVendas.php");
				}else{
					$_SESSION['msg'] = "Quantidade declarada não disponivel em estoque.";
					header("Location: cadVendas.php");
				}
			}
			
			
		}else{
			$_SESSION['msg'] = "Produto não encontrado.";
			header("Location: cadVendas.php");
		}
			
		//fazer um if pra ver se a quantidade atual é >= a em estoque e depois procurar como fazer um alter 
		//para a tabela produtos pra poder fazer a subtração do prod_quant.

	}
}