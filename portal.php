<?php

include(dirname(__FILE__)."/includes/pdo_postgres0.php");
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");

if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";

switch ($action) {
    case "home":

    break;

    case "carrito":

    break;

    case "productos":

    break;

    default:
        $data["error"] = "Accion No permitida";
}

include(dirname(__FILE__)."/partials/footer.php");
?>