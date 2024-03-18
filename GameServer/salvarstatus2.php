<?php
include('conexao.php');

$inserirEstatisticas = "UPDATE `estatisticas` 
SET `tempoJogo` = '2', `Minutos` = '2', `Segundos` = '2', `Terminou` = '1', `Soma` = '22' 
WHERE `estatisticas`.`nome` = 'marmar'";



mysqli_query($conn, $inserirEstatisticas);
?>