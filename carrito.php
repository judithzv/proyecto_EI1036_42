<?php
if (!empty($_COOKIE["carrito"])){
    print '<table><thead>';
    $carrito = $_COOKIE["carrito"];
    $carrito = explode("$", $carrito);
    foreach($carrito as $id){
        print "<tr>";
        $query2 = "SELECT * FROM productos WHERE product_id=$id";
        $rows=ejecutarSQL($query2,NULL);
        $price=0;
        foreach($rows as $row) {
            $i = 0;
            $id = "";
            foreach ($row as $key => $val) {
                if ($i == 0)
                    $id = $val;
                if ($i == 1)
                    echo "<th>", $val,"</th>";
                if ($i == 2)
                    echo "<th>", $val, "€", "</th>";
                if ($i == 3){
                    echo "<td>", "<img src='$val' id='lista'>", "</td>";
                }
                $i+=1;
            }
        }
        print "</tr>";
    }
}

else{
    echo "Tu carrito está vacío";
}
?>