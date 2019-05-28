<?php require_once '../template-parts/header-in.php';
include '../model/show-cart-products.php';
?>

<section class="section">
	<div class="container-list">
		<div class="notification">

			<p class="has-text-black has-text-centered"><strong>The games you desire very much</strong></p>
			<br>

			<?php
			foreach( $cart_games as $game ){

				echo '
                <div class="columns">
                    <div class="column is-one-third">
                        <figure class="image is-128x128">
                        <img src=' . $game['cover'] .'>
                    </figure>
                    </div>
                    
                    <div class="column is-one-third">
                        <p><strong>
                        '. 'Category:' . $game['category'] . ' ' . 'Quantity: ' . $game['quantity'] .
                     '</strong></p>
                    </div>
                    
                    <div class="column is-one-third">
                        <p><strong>'. $game['price']. '$' . '</strong></p>
                    </div>
				
				</div>';
			}
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
