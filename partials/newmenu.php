<main>
    <?php
     if (empty($_COOKIE["login"])){
        echo "<a href='./portal.php?action=home' id='nm'><i class='fa fa-info-circle' aria-hidden='true'></i></a>";
        echo "<a href='?action=productos' id='nm'><i class='fa fa-home' aria-hidden='true'></i></a>";
        echo "<a href='?action=registro' id='nm'><i class='fa fa-user-plus' aria-hidden='true'></i></a>";
        echo "<a href='?action=login' id='nm'><i class='fa fa-sign-in' aria-hidden='true'></i></a>";
     }
     else {
        echo "<a href='./portal.php?action=home' id='nm'><i class='fa fa-info-circle' aria-hidden='true'></i></a>";
        echo "<a href='?action=productos' id='nm'><i class='fa fa-home' aria-hidden='true'></i></a>";
        echo "<a href='?action=carrito' id='nm'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>";
        echo "<a href='./portal.php?action=home' id='nm'><i class='fa fa-sign-ou' aria-hidden='true'></i></a>";
     }
    ?>
</main>
