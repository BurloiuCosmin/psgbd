<?php require_once '../template-parts/header-in.php';
include '../utilities/connection.php';
include '../model/showgames.php';
include '../model/information_to_edit.php';
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


				<div class="field is-grouped">
					<div class="control">
						<br>
						<a href="http://pixy.local/ssh/view/add.php" class="button is-danger is-rounded">Add a new one</a>
					</div>
				</div>
        </div>
    </div>
</section>


</body>
</html>

<?php require_once '../template-parts/footer.php';  ?>
