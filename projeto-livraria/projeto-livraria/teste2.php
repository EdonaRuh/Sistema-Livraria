<?php
require_once 'connect.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$confirm = $_POST['confirm'];

$sql = "insert into usuario (user_nome, user_cpf, user_login, user_senha, user_cargo) values ('$nome', '$cpf', '$login', '$senha', 2)";

if (!mysqli_query($conn,$sql)){
    die('Error: ' . mysqli_error($conn));
}

echo "1 record added";


//while($res = mysqli_fetch_assoc($query)){
	//$nome = $res['user_nome'];
//}
