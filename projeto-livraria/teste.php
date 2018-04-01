<?php
require_once 'connect.php';

echo "
	<form name='form1' method='post' action='teste2.php'>
		Nome<input type='text' name='nome'>
		CPF<input type='text' name='cpf' maxlength='11'>
		Login<input type='text' name='login'>
		Senha<input type='password' name='senha'>
		Confirma senha<input type='password' name='confirm'>
		<input type='submit' value='salvar'>
	</form>
";