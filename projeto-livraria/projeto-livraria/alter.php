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
		<?php
			$sql = "SELECT * FROM produtos WHERE prod_id='$id'";
			$query = mysqli_query($conn, $sql);
			echo "<br/><br/><form name='form1' method='post' action='validAlter.php' align='center'>
					<table align='center'>
			";
			while($res = mysqli_fetch_assoc($query)){
				$id = $res['prod_id'];
				$nome = $res['prod_nome'];
				$autor = $res['prod_autor'];
				$edit = $res['prod_edit'];
				$quant = $res['prod_quant'];
				$valor = $res['prod_valor'];

				echo "
					<input type='hidden' name='txtId' value='$id'>
					<tr>
						<td>Nome:</td>
						<td><input type='text' name='txtNome' value='$nome'></td>
					</tr>
					<tr>
						<td>Autor:</td>
						<td><input type='text' name='txtAutor' value='$autor'></td>
					</tr>
					<tr>
						<td>Editora:</td>
						<td><input type='text' name='txtEdit' value='$edit'></td>
					</tr>
					<tr>
						<td>Quantidade:</td>
						<td><input type='text' name='txtQuant' value='$quant'></td>
					</tr>
					<tr>
						<td>Valor:</td>
						<td><input type='text' name='txtValor' value='$valor'></td>
					</tr>
					<tr>
						<td></td>
						<td align='right'><input type='submit' value='Enviar'></td>
					</tr>
				";
			}
			echo "</table>";  //criar o arquivo validAlter.php para validar as alterações e depois fazer o delete.
		?>
	</main>
</body>
</html>