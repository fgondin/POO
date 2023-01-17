<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
//Instnaciando a classe UsuarioDao

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
echo "id: $id, nome: $name, email: $email";
//Usando a integração do banco de dados para postar os dados novos.

if ($id && $nome && $email){
  $usuario = new Usuario();
  $usuario->setId($id);
  $usuario->setNome($name);
  $usuario->setEmail($email);
  //Se os dados forem preenchidos, os dados adicionados serão setados.

  $usuarioDao->update($usuario);
  header("Location: index.php");
  exit;
  //Chamando o método update.

} else {
  header("Location: editar.php?id=".$id);
  exit;
};