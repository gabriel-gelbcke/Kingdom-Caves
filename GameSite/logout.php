<?php
session_start();
session_destroy();
$_SESSION['logado'] = "0";
header('Location: index.php');
exit();