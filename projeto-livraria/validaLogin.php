<?php
session_start();
require_once 'connect.php';

$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];

if(!$login){
	$_SESSION['msg'] = "Preencha todos os campos.";
	header("Location: index.php");
}elseif(!$senha){
	$_SESSION['msg'] = "Preencha todos os campos.";
	header("Location: index.php");
}else{
	$sql = "SELECT * FROM usuario WHERE user_login='$login' LIMIT 1";
	$confirm = mysqli_query($conn, $sql);

	while($res = mysqli_fetch_assoc($confirm)){
		$id = $res["user_id"];
		$nome = $res["user_nome"];
		$usuario = $res["user_login"];
		$pass = $res["user_senha"];
		$cargo = $res["user_cargo"];
	}

	if($senha == $pass){
		$_SESSION['id'] = $id;
		$_SESSION['name'] = $nome;
		$_SESSION['user'] = $usuario;
		$_SESSION['pass'] = $pass;
		$_SESSION['cargo'] = $cargo;

		if($_SESSION['cargo'] == 1){
			header("Location: home.php");
		}else{
			header("Location: home2.php");
		}
		
	}else{
		$_SESSION['msg'] = "Login ou senha incorretos.";
		header("Location: index.php");
	}
}



