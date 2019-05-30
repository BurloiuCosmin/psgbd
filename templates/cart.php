<?php require_once '../template-parts/header-in.php';
?>

<section class="section">
	<div class="container-list">
		<div class="notification">

			<p class="has-text-black has-text-centered"><strong>The games you desire very much</strong></p>
			<br>

			<?php
			include '../model/show-cart-products.php';

			?>

            <div class="field is-grouped">
                <div class="control center">
                    <br>
                    <button type="submit" name="buy_more" class="button is-medium is-rounded is-danger">
                        Checkout?
                    </button>
                </div>
            </div>

		</div>
	</div>
</section>


<?php require_once '../template-parts/footer.php';  ?>
