<?php
	session_start();
	if(empty($_SESSION['id'])){
		$_SESSION['msg'] = "Favor efetuar Login";
		header("Location: index.php");
	}
	require_once 'connect.php';
	$id = $_GET['prod_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<link rel='stylesheet' type='text/css' href='css.css'>
	<title>Home</title>
</head>
<body>
	<header>
		<p><small>
		<?php
			echo "
				<table align='right'>
					<tr>
						<td width='40px'>{$_SESSION['name']}</td>
						<td width='40px' align='right'><a href='sair.php'> Sair</a></td>
					</tr>
				</table>
			";
		?>
		</small><h1 align="center">Facilita</h1></p>
		<hr>
		<nav>
			<table align='center'>
				<tr align='center'>
					<td width='10%'><a href="cadEstoque.php">Cadastro</a></td>
					<td width='10%'><a href="consultaEstoque.php">Consulta</a></td>
					<td width='10%'><a href="cadVendas.php">Vendas</a></td>
					<td width='10%'><a href="consultaHistorico.php">Historico</a></td>
					<td width='10%'><a href="alterADM.php">Modificações</a></td>
					<td width='10%'><a href="cadADM.php">Funcionários</a></td>
					<td width='10%'><a href="contato.php">Contato</a></td>
				</tr>
			</table>
			<hr>
		</nav>
	</header>

	<main>
		<form name='form1' method='post' action='validDelete.php' align='center'>
			<p align='center'><black>
			Caso Queira continuar com essa ação, os dados à baixo serão excluidospermanentemente do sistema.<br>
			Deseja continuar?</black></p>
			<a href='alterADM.php' aling=>Voltar</a>     <input type='Submit' value='Excluir' align='right'>
			<hr>
			<br/>
			<br/>
			<table align='center' border='1'>
		<?php
			$sql = "SELECT * FROM produtos WHERE prod_id='$id'";
			$query = mysqli_query($conn, $sql);
			while($res = mysqli_fetch_assoc($query)){
				$_SESSION['idDelete'] = $res['prod_id'];
				$nome = $res['prod_nome'];
				$autor = $res['prod_autor'];
				$edit = $res['prod_edit'];
				$quant = $res['prod_quant'];
				$valor = $res['prod_valor'];

				echo "
				<tr>
					<td>Nome:</td>
					<td>{$nome}</td>
				</tr>
				<tr>
					<td>Autor:</td>
					<td>{$autor}</td>
				</tr>
				<tr>
					<td>Editora:</td>
					<td>{$edit}</td>
				</tr>
				<tr>
					<td>Quantidade:</td>
					<td>{$quant}</td>
				</tr>
				<tr>
					<td>Valor:</td>
					<td>{$valor}</td>
				</tr>
				";//<-- fazer os dados serem apresentados dentro de uma table para o usuario confirmar se 
				//quer realmente deletar aqueles dados. A mensagem sera:
				// Deseja realmente deletar estes dados? Eles seram apagados permanentemente do sistema.
			}
		?>
	</main>
</body>
</html>