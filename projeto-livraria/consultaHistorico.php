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
			<hr>			
			<?php 
				$sql = "SELECT * FROM vendas";
				$query = mysqli_query($conn, $sql);
				echo "
					<table width='100%'	border='1' align='center'>
						<tr>
							<td>ID Produto</td>
							<td>Nome</td>
							<td>Quantidade</td>
							<td>Valor Unit</td>
							<td>Valor Tot</td>
							<td>Vendedor</td>
							<td>Data</td>
						</tr>
				";
				while($res = mysqli_fetch_assoc($query)){
					$id = $res['vend_id'];
					$item = $res['vend_item'];
					$quant = $res['vend_quant'];
					$valor = $res['vend_valUnit'];
					$tot = $res['vend_valor'];
					$user = $res['vend_user'];
					$idProd = $res['prod_id'];
					$data = $res['vend_date'];

					echo "
						<tr>
							<td>".$idProd."</td>
							<td>".$item."</td>
							<td>".$quant."</td>
							<td>".$valor."</td>
							<td>".$tot."</td>
							<td>".$user."</td>
							<td>".$data."</td>
						</tr>
					";
				}
			?>
			<article>
				
			</article>
		</section>
	</main>
</body>
</html>