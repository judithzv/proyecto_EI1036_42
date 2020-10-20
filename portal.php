<?php

include(dirname(__FILE__)."/includes/pdo_postgres0.php");
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");

if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";

switch ($action) {
    case "home":
        print '<table>';
        print '<tr><td>';
        print 'Somos Judith Zorío Ventura y Núria Moreno Chamorro, alumnas de la Universidad Jaume I de Castellón, actualmente estamos
        cursando Ingeniería informática. Hemos decidido implementar una tienda de instrumentos musicales.';
        print '</tr></td>';
        print '</table>';

    break;

    case "registro":
    break;

    case "carrito":

    break;

    case "productos":
        $table = "productos";
        $query = "SELECT     * FROM      $table ";
        $rows=ejecutarSQL($query,NULL);
        if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
            print '<table><thead>';
            foreach ($rows as $row) {
                print "<tr>";
                $i = 0;
                foreach ($row as $key => $val) {
                    if ($i == 1)
                        echo "<th>", $val,"</th>";
                    if ($i == 2){
                        echo "<td>", "<img src='$val' id='lista'>", "</td>";
                    }
                    if ($i == 2){
                    echo "<td>","<input type='button' value='Añadir al carrito'>", "</td>";
                    }
                    $i+=1;
                }
                print "</tr>";
            }
            print "</table>";
        }
        break;

    break;

    default:
        $data["error"] = "Accion No permitida";
}

include(dirname(__FILE__)."/partials/footer.php");
?>