<?php require_once '../template-parts/header.php';
//include '../model/tokencreator.php';
?>

<html>
<body>

<section class="section">
	<div class="container">
		<div class="notification">

			<?php
			if(!empty($errors)){
				foreach ($errors as $error){
					echo  "<p class=\"has-text-primary has-text-centered\"><strong>$error</strong></p><br>";
				}
			}
			?>

            <form action=" " method="post">

			<p class="has-text-black has-text-centered"><strong>Password Reset Email</strong></p>
			<br>
			<h3 class="has-text-black has-text-centered">We will send you an email to the address below with the information needed for you to change your password.</h3>
			<br>
			<br>
			<div class="field">
				<label class="label">Your email <ion-icon name="mail"></ion-icon> </label>
				<div class="control ">
					<input class="input is-primary" type="email" placeholder="Email address" name="email">
					<br>
					<br>
                    <button type="submit" class="button is-rounded is-danger" name="send">Send email</button>
                </form>

                </div>
			</div>

					<div class="level">
						<div class="container">
							<p>or...</p>
							<br>
							<div class="container has-text-center">
								<a class="button is-primary is-rounded" href="login.php">Log into your account</a>
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
