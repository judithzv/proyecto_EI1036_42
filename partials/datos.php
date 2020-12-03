<?php

$table = "productos";
$query = "SELECT     * FROM      $table ";
$rows=ejecutarSQL($query,NULL);
$login = "";

$i = 0;

foreach ($rows as $row){
    if(isset($_COOKIE["login"])){
        $login = $_COOKIE["login"];
    }
    $row['login'] = $login;
    $rows[$i] = $row;
    $i += 1;

}

$datos=json_encode($rows);

echo "<body onload='getVisor($datos)'>";
echo "<div class='visor'></div>";
echo "<script src='/../js/visor.js'></script></body>";

?>