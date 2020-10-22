<?php

include(dirname(__FILE__)."/includes/pdo_postgres0.php");

include(dirname(__FILE__)."/partials/header.php");

if (empty($_COOKIE["login"])){
    include(dirname(__FILE__)."/partials/menusinlogin.php");
}
else{
    include(dirname(__FILE__)."/partials/menulogin.php");
}
#include(dirname(__FILE__)."/partials/newmenu.php");

if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";

$id_compra = 0;
$id_cliente = 0;
$central = "";

switch ($action) {
    case "home":
        $central = "./productos.php";

    break;

    case "carrito":

    break;

    case "productos":
        $central = "./productos.php";
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

        case "registrar":
            $datos = $_REQUEST;
            $table = "clientes";

        if (count($_REQUEST) < 6) {
            $data["error"] = "No has rellenado el formulario correctamente";
            return;
        }
            $query = "INSERT INTO     $table (name, surnames, username, password, mail, address)
                                VALUES (?,?,?,?,?,?);";
                            
            $a=array($_REQUEST["name"], $_REQUEST["surnames"], $_REQUEST["username"], $_REQUEST["password"], $_REQUEST["mail"], $_REQUEST["address"]);
            ejecutarSQL($query, $a);

        break;

        case "login":
            if (empty($_COOKIE["login"])){
                $central = "./partials/login.php";
            }

            else {
                $central = "./partials/session.php";
            }
        break;

        case "logout":
            setcookie("login", "", time()-3600);
            $central = "./productos.php";
            header("Refresh:0, url=./portal.php?action=home");
        break;

        case "acceder":
            $table = "clientes";
            $user = $_REQUEST["username"];
            $password = $_REQUEST["password"];
            $query = "SELECT * FROM $table WHERE username = ? and password = ?";
            $a = array($user, $password);
            $rows=ejecutarSQL($query, $a);
            if (empty($rows)) {
                $data["error"] = "El usuario o la contraseña no son correctos.";
                $central = "/partials/login.php";
            }

            else{
                setcookie("login", $user, time()+3600);
                $central="./productos.php";
                header("Refresh:0, url=./portal.php?action=home");
                
            }
        break;

    default:
        $data["error"] = "Accion No permitida";
}

if ($central <> "") include(dirname(__FILE__).$central);
include(dirname(__FILE__)."/partials/footer.php");
?>