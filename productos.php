<?php
echo "<main>";
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
        foreach ($row as $key => $val) {
            if ($i == 0)
                $id = $val;
            if ($i == 1)
                echo "<th>", $val,"</th>";
            if ($i == 2)
                echo "<th>", $val, "€", "</th>";
            if ($i == 3){
                echo "<td>", "<img src='$val' id='lista'>", "</td>";
                echo "<td>", "<a href='./portal.php?action=add&id_producto=$id' value='Carrito' id='carrito' >Comprar <i class='fa fa-shopping-cart'></i></a>",
                "</td>";
            }
            $i+=1;
        }
        print "</tr>";
    }
    print "</table>";
}
echo "</nav>";
echo "</main>";
?>