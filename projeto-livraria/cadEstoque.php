<?php
	session_start();
	if(empty($_SESSION['id'])){
		$_SESSION['msg'] = "Favor efetuar Login";
		header("Location: index.php");
	}
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
		</nav>
	</header>

	<main>
		<hr>
		<p><h2 align='center'>Cadastro de novos volumes</h2></p>		
		<section align='center'>
			<form name="form1" method="post" action="cadastro.php">
			<table align='center'>
				<tr height='50px'>
					<td align='right'>Nome:</td>
					<td><input type="text" name="txtNome"></td>
				</tr>
				<tr height='50px'>
					<td align='right'>Autor:</td>
					<td><input type="text" name="txtAutor"></td>
				</tr>
				<tr height='50px'>
					<td align='right'>Editora:</td>
					<td><input type="text" name="txtEdit"></td>
				</tr>
				<tr height='50px'>
					<td align='right'>Quantidade:</td>
					<td><input type="text" name="txtQuant"></td>
				</tr>
				<tr height='50px'>
					<td align='right'>Valor:</td>
					<td><input type="text" name="txtValor"></td>
				</tr>
				<hr>
				<tr height='50px'>
					<td align='right'><input type="reset" value="Limpar"></td>
					<td align='right'><input type="submit" value="Salvar"></td>
			</table>
			<hr>
			<br>
				<?php 
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
				?>
		</section>
	</main>
</body>
</html>