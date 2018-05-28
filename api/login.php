<?php
	require '../app/app.php';

	session_start();

	$conn = connect();
	 
	$out = array('error' => false);
	 
	$username = $_POST['username'];
	$password = $_POST['password'];
	 
	if ($username == '') {
		$out['error'] = true;
		$out['message'] = 'Username é obrigatório';
	} else if ($password == '') {
		$out['error'] = true;
		$out['message'] = 'Password é obrigatório';
	} else {
		$sql = "SELECT id FROM users WHERE username = '{$username}' and password = '{$password}' ";
		$query = $conn->query($sql);

		if ($query->num_rows > 0) {
			$data = $query->fetch_array();
			$_SESSION['user'] = $data['id'];
			$out['message'] = 'Login realizado com sucesso';
		} else {
			$out['error'] = true;
			$out['message'] = 'Falha no login! Usuário não encontrado';
		}
	}
	 
	$conn->close();
	 
	header('Content-type: application/json');
	echo json_encode($out);
	die();