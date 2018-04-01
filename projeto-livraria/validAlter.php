<?php
session_start();
require_once 'connect.php';

$id = $_POST["txtId"];
$nome = $_POST["txtNome"];
$autor = $_POST["txtAutor"];
$edit = $_POST["txtEdit"];
$quant = $_POST["txtQuant"];
$valor = $_POST["txtValor"];

$sql = "UPDATE produtos SET 
prod_nome='$nome', prod_autor='$autor', prod_edit='$edit', prod_quant='$quant', prod_valor='$valor'
WHERE prod_id='$id'";

$query = mysqli_query($conn, $sql);

$_SESSION['msg'] = "Dados alterados com sucesso!";
header("Location: alterADM.php");