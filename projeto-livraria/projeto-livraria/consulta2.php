<?php
session_start();
require_once 'connect.php';

$escolha = $_POST['txtEscolha'];
$pesquisa = $_POST['txtPesquisa'];

if(!$pesquisa){
	$_SESSION['msg'] = "Adicione algum registro para poder realizar a busca.";
	header("Location: alterADM.php");
}else{
	if($escolha == 1){
		$_SESSION['sql'] = "SELECT * FROM produtos WHERE prod_nome LIKE '%$pesquisa%'";
		header("Location: alterADM.php");
	}elseif($escolha == 2){
		$_SESSION['sql'] = "SELECT * FROM produtos WHERE prod_autor LIKE '%$pesquisa%'";
		header("Location: alterADM.php");
	}else{
		$_SESSION['sql'] = "SELECT * FROM produtos WHERE prod_edit LIKE '%$pesquisa%'";
		header("Location: alterADM.php");
	}
}
