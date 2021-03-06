<?php
session_start();

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
global $Prod2ID;

switch ($action) {
    case "home":
        $central = "./partials/productos_visor.php";
    break;

    case "carrito":
        $central = "./partials/carrito.php";
    break;

    case "miscompras":
        $central = "./partials/miscompras.php";
    break;

    case "tarjeta":
        $central = "./partials/formulario.php";
    break;

    case "busqueda_precios":
        $central = "./partials/formulario_busqueda.php";
    break;

    case "precios":
        $central = "./partials/precios.php";
    break;


    case "info":
        $central = "./partials/quienesSomos.php";
        break;

        case "add":
            $id_producto = $_GET["id_producto"];
            if(empty( $_COOKIE["login"])) {
                setcookie('no_login', 'no_login', time()+3600);
                header("Refresh:0, url=./portal.php?action=login");
            }
            else{
                if (empty($_SESSION["carrito"])){
                    $carrito = array();
                    $carrito[$id_producto] = 1;                }
                else{
                    $carrito = $_SESSION["carrito"];
                    if (empty($carrito[$id_producto])){
                        $carrito[$id_producto] = 1;
                    }
                    else {
                        $carrito[$id_producto] += 1;
                    }
                }
                $_SESSION["carrito"] = $carrito;
                setcookie('añadido', 'añadido', time()+3600);
                header("Refresh:0, url=./portal.php?action=home");
        }

        break;

        case "delete":
            $carrito = $_SESSION["carrito"];
            $id_producto = $_GET["id_producto"];
            $carrito[$id_producto] -= 1;
            if ($carrito[$id_producto] == 0){
                unset($carrito[$id_producto]);
            }
            $_SESSION["carrito"] = $carrito;
            setcookie('eliminado', "eliminado", time()+3600);
            header("Refresh: 0, url=./portal.php?action=carrito");
        break; 

        case "pagar":
            $login = $_COOKIE["login"];
            $query = "SELECT client_id FROM clientes WHERE username='$login'";
            $rows = ejecutarSQL($query, NULL);
            $client_id = "";
            foreach($rows as $row){
                $client_id = $row["client_id"];
            }
            $productos = $_POST['productos'];
            $cantidades = $_POST['cantidades'];
            $productos =  explode(',', $productos);
            $cantidades = explode(',', $cantidades);

            for($i = 0; $i < count($productos); $i++){
                $cantidad = $cantidades[$i];
                $product_id = $productos[$i];
                for ($j = 0; $j < $cantidad; $j ++){
                    $query1 = "INSERT INTO compras (client_id, product_id, date) VALUES(?, ?, ?)";
                    $a = array($client_id, $product_id, date("Y/m/d"));
                    ejecutarSQL($query1, $a);

                }
            }
            header("Refresh: 0,  url=./portal.php?action=exito_compra");


        break;

        case "exito_compra":
            $result='<div class="alert alert-success">Tu compra ha sido procesada con éxito</div>';
            echo $result;
        break;


        case "pagar_old":
            $carrito = $_SESSION["carrito"];
            $login = $_COOKIE["login"];
            $query = "SELECT client_id FROM clientes WHERE username='$login'";
            $rows = ejecutarSQL($query, NULL);
            $client_id = "";
            foreach($rows as $row){
                $client_id = $row["client_id"];
            }
            foreach($carrito as $id => $cantidad){
                for ($i = 0; $i < $cantidad; $i ++){
                    $query1 = "INSERT INTO compras (client_id, product_id, date) VALUES(?, ?, ?)";
                    $a = array($client_id, $id, date("Y/m/d"));
                    ejecutarSQL($query1, $a);

                }
                unset($_SESSION["carrito"]);
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

            $central = "./partials/login.php";

        break;

        case "login":
            $central = "./partials/login.php";
        break;

        case "logout":
            setcookie("login", "", time()-3600);
            $central = "./partials/productos_visor.php";
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
                $_SESSION["carrito"] = array();
                setcookie("login", $user, time()+3600);
                $central="./partials/productos_visor.php";
                header("Refresh:0, url=./portal.php?action=home");

                
            }
        break;

        case "nuevo_producto":
            $central = './partials/nuevo_producto.php';
        break;
    
        case "insertar_producto":
            $table = "productos";
            $URL_image = $_COOKIE["nuevo_instrumento"];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $query = "INSERT INTO     $table (name, price, image)
            VALUES (?,?,?);";
            $a=array($name, $price, $URL_image);
            ejecutarSQL($query, $a);
            $central = "./partials/productos_visor.php";

        break;

        case "upload":
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])){
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false) {
                    #echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    setcookie("nuevo_instrumento", $target_file, time()+3600);
                } else {
                    #echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            header("Refresh:0, url=./portal.php?action=nuevo_producto");
        break;

    default:
        $data["error"] = "Accion No permitida";
}

if ($central <> "") include(dirname(__FILE__).$central);
include(dirname(__FILE__)."/partials/footer.php");
?>