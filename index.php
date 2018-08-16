<?php

	require_once('config.php');

	
	// $sql = new Sql();
	// $usuarios = $sql->select("SELECT * FROM tb_usuarios");
	// echo json_encode($usuarios);

	// lista 1 usuário
	// $teste = new Usuario();
	// $teste->loadById(1);
	// echo $teste;

	//lista todos os usuarios
	//$lista = Usuario::getList();
	//echo json_encode($lista);

	//Busca o usuario pelo login
	//$search = Usuario::search('mar');
	//echo json_encode($search);

	//login, trazer os dados do usuario logado
	$usuario = new Usuario();
	$usuario->login("teste","12345");
	echo $usuario;