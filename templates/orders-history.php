<?php
/*if ( ! defined( 'SSH_ABSPATH' ) ) {
	die;
}*/

require_once '../template-parts/header-in.php';
//include /*SSH_ABSPATH . */
//'../utilities/connection.php';
//include '../model/showhistory.php';

?>

<section class="section">
	<div class="container">
		<div class="notification">

			<p class="has-text-black has-text-centered"><strong>Your orders until this moment</strong></p>
			<br>

			<!--Paragraful de mai jos e constant adaugat cand apare o comanda noua, numarul se itereaza si scade automat.  -->

			<?php $index=1;
			foreach($products as $product){
			if($product['user_id']==$_COOKIE['user_id'])
			{
				echo '
                <div class="columns">
                <div class="column is-one-half has-text-centered">
				<p><strong>' .$index++ . '.' . $product['date'] . '</strong></p>
		        </div>
				
				<div class="column is-one-quarter has-text-centered">
				<p><strong>'. $product['participants_number']. '</strong></p>
				</div>
				
				<div class="column is-one-quarter auto">
				<p><strong>'. $product['budget']. '$' .'</strong></p>
				</div>
				</div>';
			}}
			?>

			<div class="field is-grouped">
				<div class="control">
					<br>
					<a href="http://pixy.local/ssh/view/rounds.php" class="button is-danger is-rounded">Start a new round</a>
				</div>
			</div>
		</div>

	</div>
	</div>
</section>


<?php require_once '../template-parts/footer.php';  ?>
