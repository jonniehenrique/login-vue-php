<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login VueJS PHP</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/app.css">
</head>
<body>
	<div id="login">
		<div class="login-form">
			<div class="col-md-12">
				<input type="text" class="form-control" placeholder="Username" v-model="login.username" v-on:keyup="keymonitor">
				<input type="password" class="form-control" placeholder="Password" v-model="login.password" v-on:keyup="keymonitor">
				<button @click="checkLogin();">Login</button>
			</div>
		</div>

		<div class="login-footer">
			<div class="alert alert-danger" v-if="errorMessage"> {{ errorMessage }}</div>
			<div class="alert alert-success" v-if="successMessage"> {{ successMessage }}</div>
		</div>
	</div>
	<script src="js/vue.js"></script>
	<script src="js/axios.js"></script>
	<script src="js/app.js"></script>
</body>
</html>