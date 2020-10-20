<?php

include(dirname(__FILE__)."/includes/pdo_postgres0.php");
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");

if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";

$id_compra = 0;
$id_cliente = 0;
$central = "";

switch ($action) {
    case "home":

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
                        echo "<td>", "<input type='button' href='./portal.php?action=add&id_producto=$id' value='Carrito'>", "</td>";
                    }
                    $i+=1;
                }
                print "</tr>";
            }
            print "</table>";
        }
        break;

        case "add":
            $table="compras";
            $query= "INSERT $table VALUES (?,?,?,?)";
            $a = array($id_compra, $id_cliente, $_GET["id_producto"], date());
            print_r($a);
            $id_compra += 1;

        break;

        case "registro":
            $central = "/partials/register.php";
        break;

    default:
        $data["error"] = "Accion No permitida";
}

if ($central <> "") include(dirname(__FILE__).$central);
include(dirname(__FILE__)."/partials/footer.php");
?>