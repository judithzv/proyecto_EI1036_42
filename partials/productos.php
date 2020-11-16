<?php
echo "<main>";
if(!empty($_COOKIE['añadido'])){
    $result='<div class="alert alert-success alert-dismissable">El producto ha sido añadido a la cesta correctamente <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
    echo $result;
    setcookie('añadido', "", time()-3600);
} 
echo "<div id='container'>";

$table = "productos";
$query = "SELECT     * FROM      $table ";
$rows=ejecutarSQL($query,NULL);
if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
    print '<table><thead>';
    foreach ($rows as $row) {
        print "<tr>";
        $i = 0;
        $id = "";
        $id = $row['product_id'];
        $price = $row['price'];
        $img = $row['image'];
        echo "<td>", "<img src=$img id='lista'>", "</td>";
        echo "<th>", $row['name'],"</th>";
        echo "<th>", $price, "€", "</th>";
        $producto = json_encode($row);
        echo "<td>", "<a href='#' onclick='add($producto)' value='Carrito' id='carrito' >Añadir <i class='fa fa-shopping-cart'></i></a>",
        "</td>";
        print "</tr>";
    }
    print "</table>";
}
echo "</div>";
echo "</main>";
echo "<script src='/partials/carrito.js'></script>";
?>