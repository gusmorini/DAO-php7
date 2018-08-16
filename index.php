<?php

	require_once('config.php');

/*	$sql = new Sql();

	$usuarios = $sql->select("SELECT * FROM tb_usuarios");

	echo json_encode($usuarios);*/

	$teste = new Usuario();

	$teste->loadById(1);

	echo $teste;