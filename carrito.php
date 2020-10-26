<?php
echo "<main>";
if(!empty($_COOKIE['eliminado'])){
    $result='<div class="alert alert-success alert-dismissable">El producto ha sido eliminado de la cesta correctamente <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
    echo $result;
    setcookie('eliminado', "", time()-3600);
} 
if (!empty($_COOKIE["carrito"])){
    echo "<div id='container'>";
    $carrito = $_COOKIE["carrito"];
    $carrito = explode("$", $carrito);
    unset($carrito[0]);
    $importe = 0;
    $productos = array();
    $cantidad_total = 0;
    foreach($carrito as $id){
        $cantidad_total = $cantidad_total + 1;
        if(empty($productos[$id])){
            $productos[$id] = 1;
        }
        else{
            $productos[$id] += 1;

        }
    }
    ksort($productos);
    print '<table><thead>';
    print '<tr>';
    echo "<th>", "</th>";
    echo "<th>", "Producto", "</th>";
    echo "<th>", "Cantidad", "</th>";
    echo "<th>", "Precio", "</th>";
    print '</tr>';
    foreach($productos as $id => $cantidad){
        print "<tr>";
        $query2 = "SELECT * FROM productos WHERE product_id=$id";
        $rows=ejecutarSQL($query2,NULL);
        foreach($rows as $row) {
            $id = $row['product_id'];
            $price = $row['price']*$cantidad;
            $importe += $price;
            $img = $row['image'];
            echo "<td>", "<img src=$img id='lista'>", "</td>";
            echo "<th>", $row['name'],"</th>";
            echo "<th>", $cantidad, "</th>";
            echo "<th>", $price, "€", "</th>";
            echo "<td>", "<a href='./portal.php?action=delete&id_producto=$id' value='Delete' id='delete' >Quitar <i class='fa fa-trash'></i></a>",
                    "</td>";
        }
        print "</tr>";
    }
    print "<tr>";
    echo "<th>", "</th>";
    echo "<th>", "</th>";
    echo "<th>", "Total (", $cantidad_total, " productos)",  "</th>";
    echo "<th>", $importe, "€", "</th>";
    echo "<th>", "<a href='./portal.php?action=tarjeta' value='pagar' id='pagar' >Pagar <i class='fa fa-credit-card'></i></a>",
    "</th>";
    print "</tr>";
    print "</table>";
}

else{
    $result='<div class="alert alert-info">Todavía no se ha añadido ningún producto a la cesta</div>';
    echo $result;
}
echo "/div";
echo "</main>";
?>