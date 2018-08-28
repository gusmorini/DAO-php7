<?php

	ini_set('display_errors',1);

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
	// $usuario = new Usuario();
	// $usuario->login("gustavo","1234");
	// echo $usuario;

	//insere dados
	// $user = new Usuario();
	// $user->insert('Leo','1234');

	//atualizar registro
	// $usuario = new Usuario();
	// $usuario->loadById(4);
	// $usuario->update('Gilmar','1234');
	// echo $usuario;

	//delete
	$usuario = new Usuario();
	$usuario->loadById(6);
	$usuario->delete();