<?php require_once '../template-parts/header.php';
//require_once '../model/signin.php';
?>


    <section class="section">
        <div class="container">
            <div class="notification">

				<?php
				if ( ! empty( $errors ) ) {
					foreach ( $errors as $error ) {
						echo "<p class=\"has-text-primary has-text-centered\"><strong>$error</strong></p><br>";
					}
				}
				?>

                <form action="" method="post">

                    <p class="has-text-black has-text-centered"><strong>Start gaming now!</strong></p>
                    <br>

                    <div class="field">
                        <label class="label">Your username
                            <ion-icon name="power"></ion-icon>
                        </label>
                        <div class="control ">
                            <input class="input is-primary" type="text" placeholder="Username" name="username"
                                   maxlength="30" oninvalid="alert('You must fill out the username!');" required>

                            <div class="field">
                                <br>
                                <label class="label">Your password
                                    <ion-icon name="text"></ion-icon>
                                </label>
                                <div class="control">
                                    <input class="input is-primary" type="password" placeholder="Password"
                                           name="password" maxlength="25"
                                           oninvalid="alert('You must fill out the password!');" required>

                                    <div class="field is-grouped">
                                        <div class="control">
                                            <br>
                                            <button type="submit" name="login" class="button is-rounded is-danger">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </form>

                <div class="level">
                    <div class="container">
                        <p>or...</p>
                        <br>
                        <div class="container has-text-center">
                            <a class="button is-primary is-rounded" href="register.php">Register a new account</a>
                            <a class="button is-primary is-rounded" href="forgot.php">Forgot your password?</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


<?php require_once '../template-parts/footer.php'; ?>