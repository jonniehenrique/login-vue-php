<?php 

function connect() {
	$conn = new mysqli('localhost', 'root', '', 'vuelogin');

	if ($conn->connect_error) {
	    die('Connection failed: ' . $conn->connect_error);
	}

	return $conn;
}

function urlBase() {
	return 'http://localhost/labs/login-vuejs-php/';
}

function urlPageView($page) {
	return 'http://localhost/labs/login-vuejs-php/painel?view=' . $page;
}

function urlPage($page) {
	return 'http://localhost/labs/login-vuejs-php/' . $page;
}

function getByID($table, $id) {
	$conn = connect();

	$sql = "SELECT * FROM {$table} WHERE id = {$id}";
	$query = $conn->query($sql);
	$data = $query->fetch_assoc();

	return $data['username'];
}