<?php require_once ("../view/templates/header.php"); ?>

<?php

    $productList = $_REQUEST['productList'];

    
?>

    <div class="container-fluid text-center">

        <div class="row row-cols-4 buscador" >
            <form class="d-flex" role="search" action="../control/buscador.php" method="POST" >
                <input class="form-control me-2" name="textoBuscador" type="search" placeholder="Buscar..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            <form class="d-flex" role="search" action="../control/productList.php" method="POST" >
                <button class="btn btn-outline-success" type="submit">Ver todos</button>
            </form>
        </div>

        <div class="row row-cols-4">            
            <?php

                foreach($productList as $product){
                    ?>
                    <div class="col">
                        <?php
                            $_GET['product'] = $product;
                            include "product.php";
                        ?>
                    </div>
                    <?php
                }
            ?>
        </div>

    </div>

<?php require_once ("../view/templates/footer.php"); ?>