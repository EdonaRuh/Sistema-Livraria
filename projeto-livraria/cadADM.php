<?php
	session_start();
	if(empty($_SESSION['id'])){
		$_SESSION['msg'] = "Favor efetuar Login";
		header("Location: index.php");
	}
	require_once 'connect.php';
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
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			$sql = "SELECT * FROM usuario";
			$query = mysqli_query($conn, $sql);
			while($res = mysqli_fetch_assoc($query)){
				$id = $res['user_id'];
				$nome = $res['user_nome'];
			}
		?>
			<table border='1' align='center'>
				<tr>
					<td>id:</td>
					<td>nome:</td>
					<td>vendas:</td>
				</tr>
			<?php 
				$sql= "SELECT * FROM usuario WHERE user_cargo = 2";
				$query = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($query)){
					$id = $row['user_id'];
					$nome = $row['user_nome'];
					$vendas = $row['user_vendas'];

					echo "
						<tr>
							<td>{$id}</td>
							<td>{$nome}</td>
							<td>{$vendas}</td>
						</tr>					
					";
				}
				echo "</table><hr>";
			?>
		<br>
		<article>
			<form name='form1' method='post' action='cadFuncionario.php' align='center'>
				<table align='center'>
					<tr>
						<td>Nome:</td>					
						<td >CPF:</td>					
						<td >Usuario:</td>					
						<td >Senha:</td>					
						<td >Confirmar Senha:</td>
					</tr>
					<tr>
						<td><input type='text' name='txtNome'></td>
						<td><input type='text' name='txtCPF' maxlength="14"></td>
						<td><input type='text' name='txtUser'></td>
						<td><input type='password' name='txtSenha'></td>
						<td><input type='password' name='txtConfirm'></td>
						<td align='right'><input type='submit' value='Salvar'></td>
					</tr>
				</table>
			</form>
		</article>
	</main>
</body>
</html>

