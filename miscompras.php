<?php
echo "<main>";


$login = $_COOKIE["login"];
$query = "SELECT client_id FROM clientes WHERE username='$login'";
$rows = ejecutarSQL($query, NULL);
$client_id = "";
foreach($rows as $row){
    $client_id = $row["client_id"];
}

$query = "SELECT   * FROM   compras JOIN productos using (product_id) WHERE client_id=$client_id ";
$rows=ejecutarSQL($query,NULL);

if (empty($rows)){
$result='<div class="alert alert-info">Todavía no se han comprado productos</div>';
echo $result;
}
else{
    echo "<div id='container'>";



if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
    print '<table><thead>';
    print '<tr>';
    echo "<th>", "</th>";
    echo "<th>", "Producto", "</th>";
    echo "<th>", "Cantidad", "</th>";
    echo "<th>", "Fecha de compra", "</th>";
    print '</tr>';
    foreach ($rows as $row) {
        print "<tr>";
        $i = 0;
        $id = "";
        $id = $row['product_id'];
        $price = $row['price'];
        $img = $row['image'];
        $fech=$row['date'];
        echo "<td>", "<img src=$img id='lista'>", "</td>";
        echo "<th>", $row['name'],"</th>";
        echo "<th>", $price, "€", "</th>";
        echo "<th>", $fech, "</th>";;
        print "</tr>";
    }
    print "</table>";
}
}

echo "</main>";
?>