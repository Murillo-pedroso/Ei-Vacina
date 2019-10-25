<?php 

$cod = rand(100000, 999999);

echo $cod;
echo "</br>";
$numero_de_bytes = 2;

$restultado_bytes = random_bytes($numero_de_bytes);
$resultado_final = bin2hex($restultado_bytes);
$resultado_final = strtoupper(bin2hex(random_bytes(2)));
echo $resultado_final;
 ?>