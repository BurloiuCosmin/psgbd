<?php require_once '../template-parts/header-in.php';
include '../utilities/connection.php';
?>

<section class="section">
    <div class="container-list">
        <div class="notification">

            <p class="has-text-black has-text-centered"><strong>Available games, while supply lasts</strong></p>
            <br>

            <?php include '../model/show-one-category.php'; ?>


            


        </div>
    </div>
</section>

<?php require_once '../template-parts/footer.php';  ?>
