<?php
session_start();
require_once 'connect.php';

$nome = $_POST['txtNome'];
$autor = $_POST['txtAutor'];
$edit = $_POST['txtEdit'];
$quant = $_POST['txtQuant'];
$valor = $_POST['txtValor'];

if(!$nome){
	$_SESSION['msg'] = "Preencha todos os campos.";
	header("Location: cadEstoque.php");
}else{
	if(!$autor){
		$_SESSION['msg'] = "Preencha todos os campos.";
		header("Location: cadEstoque.php");
	}else{
		if(!$edit){
			$_SESSION['msg'] = "Preencha todos os campos.";
			header("Location: cadEstoque.php");
		}else{
			if(!$quant){
				$_SESSION['msg'] = "Preencha todos os campos.";
				header("Location: cadEstoque.php");
			}else{
				if(!$valor){
					$_SESSION['msg'] = "Preencha todos os campos.";
					header("Location: cadEstoque.php");
				}else{
					$verify = "SELECT * FROM produtos WHERE prod_nome ='$nome'";
					$query = mysqli_query($conn, $verify);
					;
					while($res = mysqli_fetch_assoc($query)){
						$val = $res['prod_nome'];
					}
					if(empty($val)){
						$sql = "INSERT INTO produtos (prod_nome, prod_autor, prod_edit, prod_quant, prod_valor) 
						VALUES ('$nome', '$autor', '$edit', '$quant', '$valor')";
						$query = mysqli_query($conn, $sql);
						$_SESSION['msg'] = "Volume registrado com sucesso!";
						header("Location: cadEstoque.php");
					}else{
						$_SESSION['msg'] = "Volume já registrado no banco.";
						header("Location: cadEstoque.php");
					}
				}
			}
		}
	}
}
	



