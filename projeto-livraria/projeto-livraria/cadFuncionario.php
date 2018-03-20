<?php
session_start();
require_once 'connect.php'; 

$nome = $_POST["txtNome"];
$cpf = $_POST["txtCPF"];
$login = $_POST["txtUser"];
$senha = $_POST["txtSenha"];
$confirm = $_POST["txtConfirm"];



if(!$nome){
	$_SESSION['msg'] = "Preencha todos os campos.";
	header("Location: cadADM.php");
}else{
	if(!$cpf){
		$_SESSION['msg'] = "Preencha todos os campos.";
		header("Location: cadADM.php");
	}else{
		if(!$login){
			$_SESSION['msg'] = "Preencha todos os campos.";
			header("Location: cadADM.php");
		}else{
			if(!$senha){
				$_SESSION['msg'] = "Preencha todos os campos.";
				header("Location: cadADM.php");
			}else{
				if(!$confirm){
					$_SESSION['msg'] = "Preencha todos os campos.";
					header("Location: cadADM.php");
				}else{
					if($senha != $confirm){
						$_SESSION['msg'] = "Senhas estão diferentes.";
						header("Location: cadADM.php");
					}else{
						$sql = "insert into usuario (user_nome, user_cpf, user_login, user_senha, user_cargo) values ('$nome', '$cpf', '$login', '$senha', 2)";

						if (!mysqli_query($conn,$sql)){
						    die('Error: ' . mysqli_error($conn));
						}

						$_SESSION['msg'] = "Funcionario cadastrado com sucesso.";
						header("Location: cadADM.php");
					}
				}
			}
		}
	}
}
