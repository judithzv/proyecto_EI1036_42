<?php

include(dirname(__FILE__)."/../includes/pdo_postgres0.php");

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

echo json_encode($rows);

?>