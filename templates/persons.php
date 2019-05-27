<?php require_once '../template-parts/header-in.php';
include '../utilities/connection.php';
include '../model/showpersons.php';
include '../model/information_to_edit.php';
?>

<html>
<body>
<style>
    .container{
        max-width: 600px;
    }
</style>


<section class="section">
	<div class="container">
		<div class="notification">

			<p class="has-text-black has-text-centered"><strong>Your Secret Santa players</strong></p>
			<br>

			<?php $index=1;
            foreach($database_persons as $person){
                if($person['user_id']==$_COOKIE['user_id'])
                {
				echo '
                <div class="columns">
                <div class="column is-one-third">
				<p><strong>
		        ' . $index++ . '.' . $person['first_name'] . ' ' . $person['last_name'] .'</strong></p>
		        </div>
				
				<div class="column is-one-third">
				<p><strong>'. $person['email']. '</strong></p>
				</div>
				
				<div class="column is-pulled-right has-text-centered ">
				<p>
					<a href="http://pixy.local/ssh/model/information_to_edit.php?id=' . $person['person_id'] . '"><ion-icon name="information-circle"></ion-icon></a>
					<a href="http://pixy.local/ssh/model/delete.php?id=' .$person['person_id']. '"><ion-icon name="trash"></ion-icon></a>
				</p>
				</div></div>';
			}}
			?>


				<div class="field is-grouped">
					<div class="control">
						<br>
						<a href="http://pixy.local/ssh/view/add.php" class="button is-danger is-rounded">Add a new one</a>
					</div>
				</div>
			</div>

				</div>
			</div>


		</div>
	</div>
</section>


</body>
</html>

<?php require_once '../template-parts/footer.php';  ?>
