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
		<section align='center'>
			<br>
			<form name='form1' method='post' action='consulta.php'>
				<select name="txtEscolha">
				    <option value="1" >Titulo</option>
				    <option value="2" >Autor</option>
				    <option value="3" >Editora</option>

				</select>
				<input type='text' name='txtPesquisa' size='60%'>
			    <input type='submit' value='Pesquisar'>
			</form>
			<hr>
			<br>
			<article>
				<?php 

					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}else{
						if(isset($_SESSION['sql'])){							
							$sql = $_SESSION['sql'];
							$query = mysqli_query($conn, $sql);
							echo "
								<table width='100%'	border='1' align='center'>
									<tr>
										<td>Nome</td>
										<td>Autor</td>
										<td>Editora</td>
										<td>Quantidade</td>
										<td>Valor</td>
									</tr>
							";
							while($res = mysqli_fetch_assoc($query)){
								$id = $res['prod_id'];
								$nome = $res['prod_nome'];
								$autor = $res['prod_autor'];
								$edit = $res['prod_edit'];
								$quant = $res['prod_quant'];
								$valor = $res['prod_valor'];

								echo "
									<tr>
										<td>".$nome."</td>
										<td>".$autor."</td>
										<td>".$edit."</td>
										<td>".$quant."</td>
										<td>".$valor."</td>
									</tr>
								";
							}							
							unset($_SESSION['sql']);
						}else{
							$sql = "SELECT * FROM produtos";
					$query = mysqli_query($conn, $sql);
					echo "
						<table width='100%'	border='1' align='center'>
							<tr>
								<td>Nome</td>
								<td>Autor</td>
								<td>Editora</td>
								<td>Quantidade</td>
								<td>Valor</td>
							</tr>
					";
					while($res = mysqli_fetch_assoc($query)){
						$id = $res['prod_id'];
						$nome = $res['prod_nome'];
						$autor = $res['prod_autor'];
						$edit = $res['prod_edit'];
						$quant = $res['prod_quant'];
						$valor = $res['prod_valor'];

						echo "
							<tr>
								<td>".$nome."</td>
								<td>".$autor."</td>
								<td>".$edit."</td>
								<td>".$quant."</td>
								<td>".$valor."</td>
							</tr>
						";
					}
						}
					}
				?>
			</article>
		</section>
	</main>
</body>
</html>