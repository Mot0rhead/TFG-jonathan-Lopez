<?php
    require_once ("../view/templates/header.php"); 
    $productRanking = $_REQUEST['productRanking'];

    
?>

    <div class="container-fluid text-center">
        <div class="row row-cols-4">

            <?php
                
                $podio = 0;
                foreach($productRanking as $product){
                    $podio += 1;
                    ?>
                    <div class="col">
                        <?php
                            $_GET['product'] = $product;
                            $_GET['podio'] = $podio;
                            include "ranking.php";
                        ?>
                    </div>
                    <?php
                }

            ?>
        </div>
    </div>

<?php require_once ("../view/templates/footer.php"); ?>