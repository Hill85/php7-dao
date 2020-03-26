<?php

require_once ("config.php");


// Carrega somente um id de usuário

//$user =new Usuario();
//$user->loadbyId(4);
//echo $user;


// Carrega uma lista de usuários

//$lista = Usuario::getList();
//echo json_encode($lista);


//Carrega uma lista de usuário, buscando pelo login.

//Pode der realizado a busca pelas iniciais do nome 
//$search = usuario::search("e");
//echo json_encode($search);


//Carrega usuário usando o login e asenha 

$usuario = new Usuario();
$usuario->login("Saimon", "123456789");

echo $usuario;



/*
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");


echo json_encode($usuarios);*/


?>