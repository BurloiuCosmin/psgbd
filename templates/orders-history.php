<?php
require_once '../template-parts/header-in.php';
require_once '../utilities/connection.php';
require_once '../utilities/functions.php';

?>

<section class="section">
	<div class="container">
		<div class="notification">

			<p class="has-text-black has-text-centered"><strong>Orders History</strong></p>
			<br>

			<!--Paragraful de mai jos e constant adaugat cand apare o comanda noua, numarul se itereaza automat.  -->

			<?php $index=1;
			foreach( $orders as $order ){

                if( $order['user_id'] == $_COOKIE['user_id'] )
                {
                    echo '
                    <div class="columns">
                    
                    <div class="column is-one-quarter has-text-centered">
                    <p><strong>'. $order['order_id']. '</strong></p>
                    </div>
                    
                    <div class="column is-one-half has-text-centered">
                    <p><strong>' . $index++ . '.' . $order['date_ordered'] . '</strong></p>
                    </div>
                    
                    <div class="column is-one-quarter has-text-centered">
                    <p><strong>'. $order['games_number']. '</strong></p>
                    </div>
                    
                    <div class="column is-one-quarter auto">
                    <p><strong>'. $order['cost']. '$' .'</strong></p>
                    </div>
                    </div>';
                }
			}
			?>

			<div class="field is-grouped">
				<div class="control">
					<br>
					<a href="http://psgbd.local/psgbd/templates/games.php" class="button is-danger is-rounded">Wanna get some new games?</a>
				</div>
			</div>
		</div>
    </div>

</section>


<?php require_once '../template-parts/footer.php';  ?>
