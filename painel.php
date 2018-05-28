<?php
	require 'app.php';

	session_start();
	
	$conn = connect();
 
	if ($conn->connect_error) {
	    die('Connection failed: ' . $conn->connect_error);
	}
 
	if (! isset($_SESSION['user']) || (trim ($_SESSION['user']) == '')) {
		header('Location: index.php');
	}
 
	$userLogin = getByID('users', $_SESSION['user']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<title>Vue.js Login with PHP/MySQLi</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/painel.css">
</head>
<body>
	<header id="header">
		<div class="container">
			<h1 class="logo">
				<a href="#" class="logo-link subtitle">VueAdminPHP</a>
			</h1>

			<nav class="nav-menu">
				<a href="<?php echo urlPageView('dashboard'); ?>" class="nav-item"> Dashboard </a>
				<a href="<?php echo urlPageView('usuarios'); ?>" class="nav-item"> Usuários </a>
				<a href="<?php echo urlPage('logout'); ?>" class="nav-item">
					Sair
				</a>
			</nav>
		</div>
	</header>

		<main id="main" role="main">
			<div class="container">
				<?php
		            if (file_exists('views/' . $_GET['view'] . '.php')):
		                include_once 'views/' . $_GET['view'] . '.php';
		            else:
		                include_once 'views/404.php';
		            endif;
	            ?>
            </div>
		</main>
		<!--
		<div class="jumbotron">
			<h1 class="text-center">Bem vindo, <?php echo $row['username']; ?>!</h1>
			<a href="logout.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
		</div>
		-->

</body>
</html>