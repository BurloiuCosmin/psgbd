<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
	<script src="https://unpkg.com/ionicons@4.3.0/dist/ionicons.js"></script>
</head>
<body>


<section class="hero is-small is-warning is-bold">

	<div class="hero-body ">
		<div class="container">
			<h1 class="title">
                PSGBD
			</h1>
			<h2 class="subtitle">
                <span id="letter">P</span>layer<span id="letter">S</span> <span id="letter">G</span>reatness <span id="letter">B</span>efore <span id="letter">D</span>isconnect
			</h2>
		</div>
	</div>

<!--Aici ar trebui sa iau emailul userului, sa il caut in baza de date si sa iau first name-ul -->
	<div class="navbar-item navbar-end">
		<div class="field is grouped">
		<a class="has-text-danger">
			Welcome back, SyFu !
		</a>
		</div>
	</div>

<!--Aici ar trebui sa ii sterg cookie-ul -->

	<div class="navbar">
		<div class="navbar-item">

            <form action="../model/logout.php" method="POST">

		<button name="logout" class="has-text-black button">
			Logout
		</button>

            </form>

		</div>

		<div class="navbar-item navbar-end">
			<div class="field is-grouped">

				<a href="../templates/categories.php" class="control button is-white">Categories</a>

				<a href="../templates/games.php" class="control button is-white">Games</a>

                <a href="../templates/orders-history.php" class="control button is-white">My Orders</a>

                <a href="../templates/cart.php" class="control button is-white"><ion-icon name="cart"></ion-icon></a>


            </div>

		</div>

	</div>


</section>



