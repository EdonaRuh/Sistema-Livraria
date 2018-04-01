<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Login</title>
</head>
<body>
	<div class='div1' align='center'>
		<form name='form1' method='post' action='validaLogin.php'>
			<input type='text' name='txtLogin' placeholder='Login'><br>
			<input type='password' name='txtSenha' placeholder='Senha'><br>
			<input type='submit' value='Login'>
		</form>
		<p><small>
			<?php
		 		if(isset($_SESSION['msg'])){
		 			echo $_SESSION['msg'];
		 			unset($_SESSION['msg']);
		 		}
			 ?>
		</small></p>
	</div>
</body>
<html>