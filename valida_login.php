<?php 
	
	session_start();
	
	//var q verifica se autenticaçãao foi realizada
	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	$perfis = array(1 => 'Administrativo', 2 => 'Usuário');

	//usuarios do sistema
	$usurios_app = array(
		array('id'=>1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => '1'),
		array('id'=>2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => '1'),
		array('id'=>3, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => '2'),
		array('id'=>4, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => '2')
	);


	foreach($usurios_app as $user){
		$user['email'];
		$user['senha'];

		if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
			$usuario_autenticado = true;
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id'];
		}	
	}

	if ($usuario_autenticado) {
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;

		header('Location: home.php');

	}else{
		header('Location: index.php?login=error');
		$_SESSION['autenticado'] = 'NAO';
	}


 ?>