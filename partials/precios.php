<?php

$table = "productos";
$min=$_POST['min'];
$max=$_POST['max'];
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

$datos=json_encode($rows);
if(empty($rows)){
    echo "<div id='container'>";
    echo "<div id='mincontainer'>";
    echo "<h1>No hay productos con esos precios<h1>";
    echo "</div></div>";
}
else{
    echo "<body onload='getVisor1($datos)'>";
    echo "<div id='container'>";
    echo "<div id='mincontainer'>";
    echo "<h1>Los productos entre $min € y $max € son:<h1>";
    echo "</div></div>";
    echo "<div class='visor'></div>";
    echo "<script src='/../js/visor.js'></script></body>";
}
?>