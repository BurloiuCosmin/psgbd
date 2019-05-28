<?php require_once '../template-parts/header-in.php';
include '../utilities/connection.php';
include '../model/show-one-category.php';
?>

<section class="section">
	<div class="container-list">
		<div class="notification">

			<p class="has-text-black has-text-centered"><strong>Available games, while supply lasts</strong></p>
			<br>

			<?php
			foreach( $games as $game ){

				echo '
                <div class="columns">
                    <div class="column is-one-third">
                        <p><strong>
                        ' . '.' . $game['name'] . ' ' . $game['cover'] . '</strong></p>
                    </div>
                    
                    <div class="column is-one-third">
                        <p><strong>
                        ' . '.' . $game['category'] . ' ' . $game['availability'] .'</strong></p>
                    </div>
                    
                    <div class="column is-one-third">
                        <p><strong>' . $game['price']. '</strong></p>
                    </div>
				
				</div>';
			}
			?>

		</div>
	</div>
</section>

<?php require_once '../template-parts/footer.php';  ?>
