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
        $central = "./carrito.php";
    break;

    case "miscompras":
        $central = "./miscompras.php";
    break;

    case "tarjeta":
        $central = "./formulario.php";
    break;
        


    case "info":
        $central = "./quienesSomos.php";
        break;

        case "add":
            $carrito = "";
            if (!empty($_COOKIE["carrito"])){
                $carrito = $_COOKIE["carrito"];
                $carrito .= "$";
                $carrito .= $_GET["id_producto"];
            }
            else{
                $carrito = "$".$_GET["id_producto"];
            }
            setcookie("carrito", $carrito, time()+3600);
            setcookie('añadido', 'añadido', time()+3600);
            header("Refresh:0, url=./portal.php?action=home");

        break;

        case "delete":
            $id_producto = $_GET["id_producto"];
            $carrito = $_COOKIE["carrito"];
            $from = "$".$id_producto;
            $from = '/'.preg_quote($from, '/').'/';
            $to = "";
            $carrito = preg_replace($from, $to,  $carrito, 1);
            setcookie("carrito", $carrito, time()+3600);
            setcookie('eliminado', "eliminado", time()+3600);
            header("Refresh: 0, url=./portal.php?action=carrito");
        break; 

        case "pagar":
            $carrito = $_COOKIE["carrito"];
            $carrito = explode("$", $carrito);
            unset($carrito[0]);
            $login = $_COOKIE["login"];
            $query = "SELECT client_id FROM clientes WHERE username='$login'";
            $rows = ejecutarSQL($query, NULL);
            $client_id = "";
            foreach($rows as $row){
                $client_id = $row["client_id"];
            }
            foreach($carrito as $id){
                echo $client_id;
                $query1 = "INSERT INTO compras (client_id, product_id, date) VALUES(?, ?, ?)";
                $a = array($client_id, $id, date("Y/m/d"));
                ejecutarSQL($query1, $a);
                setcookie("carrito", "", time()-3600);
            }

            $result='<div class="alert alert-success">Tu compra ha sido procesada con éxito</div>';
            echo $result;
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

            $central = "./productos.php";

        break;

        case "login":
            $central = "./partials/login.php";
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
                setcookie("error_login", "error", time()+3600);
                $central = "/partials/login.php";
                header("Refresh:0, url=./portal.php?action=login");
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