<?php
session_start();
require_once 'connect.php';

$id = $_SESSION['idDelete'];

$sql = "DELETE FROM produtos WHERE prod_id ='$id'";
$query = mysqli_query($conn, $sql);

$_SESSION['msg'] = "Dados apagados com Sucesso.";
header("Location: alterADM.php");