<?php require_once ("../view/templates/header.php"); ?>

<?php

    $productList = $_REQUEST['productList'];

    
?>

    <div class="container-fluid text-center">
    <a class="btn btn-primary subirProducto" href="../view/subirProducto.php">Subir producto</a>
        <div class="row row-cols-4">

            <?php

                foreach($productList as $product){
                    ?>
                    <div class="col">
                        <?php
                            $_GET['product'] = $product;
                            include "productAdmin.php";
                        ?>
                    </div>
                    <?php
                }

            ?>
        </div>
    </div>

<?php require_once ("../view/templates/footer.php"); ?>