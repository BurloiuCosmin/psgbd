<html>
<head>
    <link rel="stylesheet" type="text/css" href="http://psgbd.local/psgbd/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
	<script src="https://unpkg.com/ionicons@4.3.0/dist/ionicons.js"></script>
</head>
<body>


<section class="hero is-small is-warning is-bold">

	<div class="hero-body ">
		<div class="container">
			<h1 class="title">
				SSH
			</h1>
			<h2 class="subtitle">
				Santa's Secret Helper
			</h2>
		</div>
	</div>
<!--Aici ar trebui sa iau emailul userului, sa il caut in baza de date si sa iau first name-ul -->
	<div class="navbar-item navbar-end">
		<div class="field is grouped">
		<a class="has-text-white">
			Welcome back, <?php echo $_COOKIE['first_name'];?>!
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

				<a href="categories.php" class="control button is-white">Categories</a>

				<a href="products-history.php" class="control button is-white">Products</a>

			</div>

		</div>

	</div>


</section>


