<?php require_once '../template-parts/header-in.php';
include '../utilities/connection.php';
include '../model/showgames.php';
?>

<html>
<body>

<section class="section">
	<div class="container-list">
		<div class="notification">

			<p class="has-text-black has-text-centered"><strong>Available games, while supply lasts</strong></p>
			<br>

			<?php
            foreach( $all_games as $game ){

				echo '
                <div class="columns">
                    <div class="column is-one-third">
                        <p><strong>
                        ' . '.' . $game['name'] . '</strong></p>
                    </div>
                    
                    <div class="column is-one-third">
                        <p><strong>
                        ' . '.' . $game['category'] . ' ' . $game['availability'] .'</strong></p>
                    </div>
                    
                    <div class="column is-one-third">
                        <p><strong>'. $game['price']. '</strong></p>
                    </div>
				
				</div>';
			}
			?>

        </div>
    </div>
</section>


</body>
</html>

<?php require_once '../template-parts/footer.php';  ?>
