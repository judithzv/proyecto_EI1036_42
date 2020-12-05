<?php

include(dirname(__FILE__)."/../includes/pdo_postgres0.php");

$table = "productos";
$min=$_GET['min'];
$max=$_GET['max'];
$query = "SELECT     * FROM      $table  where price>? and  price<? ";
$a = array($min, $max);
$rows=ejecutarSQL($query, $a);
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