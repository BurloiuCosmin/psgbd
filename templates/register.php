<?php require_once '../template-parts/header.php';
include '../model/signup.php';
?>

<section class="section">
    <div class="container">
        <div class="notification">

            <!--Redirectul o sa il fac din algoritmul php catre pagina orders-history.php, userul fiind deja logat .  -->

            <p class="has-text-black has-text-centered"><strong>You are just one step away...</strong></p>
            <br>

			<?php
			if ( ! empty( $errors ) ) {
				foreach ( $errors as $error ) {
					echo "<p class=\"has-text-primary has-text-centered\"><strong>$error</strong></p><br>";
				}
			}
			?>

            <form action="" method="post">


                <div class="columns">
                    <div class="column is-one-third">
                        <label class="label">Username
                            <ion-icon name="contact"></ion-icon>
                        </label>
                        <div class="control ">
                            <input class="input is-primary" type="text" name="username" maxlength="25"
                                   oninvalid="alert('You must fill out the username!');" required>
                        </div>
                    </div>

                    <div class="column is-one-third">
                        <label class="label">First Name
                            <ion-icon name="contact"></ion-icon>
                        </label>
                        <div class="control ">
                            <input class="input is-primary" type="text" name="first_name" maxlength="25"
                                   oninvalid="alert('You must fill out the first name!');" required>
                        </div>
                    </div>

                    <div class="column is-one-third">
                        <label class="label">Last Name
                            <ion-icon name="contact"></ion-icon>
                        </label>
                        <div class="control ">
                            <input class="input is-primary" type="text" name="last_name" maxlength="25"
                                   oninvalid="alert('You must fill out the last name!');" required>
                        </div>
                    </div>
                </div>


                <label class="label">Your email address
                    <ion-icon name="mail"></ion-icon>
                </label>
                <div class="control ">
                    <input class="input is-primary" type="email" placeholder="Email address" name="email" maxlength="50"
                           oninvalid="alert('You must fill out the email or write it properly!');" required>
                </div>

                <br>
                <div class="field">
                    <label class="label">Your password
                        <ion-icon name="text"></ion-icon>
                    </label>
                    <div class="control">
                        <input class="input is-primary" type="password" placeholder="Password" name="password"
                               maxlength="25" oninvalid="alert('You must fill out the password!');" required>
                    </div>
                </div>

                <br>
                <div class="columns">
                    <div class="column is-half">
                        <label class="label">Phone Number
                            <ion-icon name="call"></ion-icon>
                        </label>
                        <div class="control ">
                            <input class="input is-primary" type="tel" name="phone_number" maxlength="25"
                                   oninvalid="alert('You must fill out the phone number!');" required>
                        </div>
                    </div>

                    <div class="column is-half">
                        <label class="label">Address
                            <ion-icon name="home"></ion-icon>
                        </label>
                        <div class="control ">
                            <input class="input is-primary" type="text" name="address" maxlength="25"
                                   oninvalid="alert('You must fill out the address!');" required>
                        </div>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <br>
                        <button type="submit" name="register" class="button is-rounded is-danger">Register</button>
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
                <a class="button is-primary is-rounded" href="login.php">Log into your account</a>
            </div>

        </div>
    </div>

</section>


<?php require_once '../template-parts/footer.php'; ?>
