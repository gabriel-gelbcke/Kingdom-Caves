<?php

require ("conexao.php");

include('verifica_login.php');

$login = $_SESSION['usuario'];

$title = $_POST['titulo'];

$date = $_POST['datee'];

$time = $_POST['horaa'];


$sql = "INSERT INTO `save_status` (`id_save`, `user`, `titulo`, `dataa`, `hora`) VALUES (NULL, '$login', '$title', '$date', '$time')";

header("Content-type: text/html; charset=utf-8");


mysqli_query($conn, $sql);

header('Location: index.php');

?>
