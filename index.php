<?php 
require_once("inc/header.php");
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-8">
            content
            <?php include ("inc/rewrite.php"); ?>
        </div>
        
        <div class="col-md-4">
            <?php include("inc/sidebar.php"); ?>
        </div>
    </div>

</div>

<?php require_once("inc/footer.php"); ?>

