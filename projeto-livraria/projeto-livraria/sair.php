<?php
	session_start();
	unset($_SESSION['id'],$_SESSION['name'],$_SESSION['user'],$_SESSION['pass']);
	$_SESSION['msg'] = "Deslogado com Sucesso.";
	header("Location: index.php");