<?php require_once '../template-parts/header.php'; ?>

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

				<form action="" method="post">

					<p class="has-text-black has-text-centered"><strong>Send us all your awesome thoughts!</strong></p>
					<br>

					<div class="field">
						<label class="label">Your email <ion-icon name="mail"></ion-icon> </label>
						<div class="control ">
							<input class="input is-primary" type="email" placeholder="Email address" name="email" maxlength="30" oninvalid="alert('You must fill out the email!');" required>

							<div class="field">
								<br>
								<label class="label">What is the greeting that you wanna send us?<ion-icon name="logo-game-controller-b"></ion-icon> </label>
								<div class="field">
									<div class="control">
										<textarea class="textarea is-primary" type="text" placeholder="What seems to be the problem? Or do you just wanna send us some cute pictures of dogs?"></textarea>
									</div>
								</div>
								<button name="sendContact" type="submit" onclick="alert('Thank you for your kind thoughts!');" class="button is-rounded is-danger">Send</button>
							</div>
				</form>

				<div class="level">
					<div class="container">
						<br>
						<p>In case you've lost yourself: </p>
						<br>
						<div class="container has-text-center">
							<a class="button is-primary is-rounded" href="login.php">Login</a>
							<a class="button is-primary is-rounded" href="register.php">Register a new account</a>
							<a class="button is-primary is-rounded" href="forgot.php">Forgot your password?</a>
						</div>

					</div>
				</div>

			</div>
		</div>
	</section>


<?php require_once '../template-parts/footer.php'; ?>
