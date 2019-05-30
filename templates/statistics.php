<?php require_once '../template-parts/header-in.php';
?>

<section class="section">
	<div class="container-categories-list">
		<div class="notification is-centered">

			<p class="has-text-black has-text-centered"><strong>List of statistics regarding our site</strong></p>
			<br>
			<div class="columns">
				<div class="column is-half">
                    <?php require_once '../model/jocuri_2015.php'; ?>
				</div>

                <div class="column is-one-third">
	                <?php require_once '../model/nr_comenzi_zi.php'; ?>
                </div>

			</div>

		</div>
	</div>
</section>


<?php require_once '../template-parts/footer.php';  ?>
