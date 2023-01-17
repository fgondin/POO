<?php
require 'config.php';
require 'dao/usuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');
if($id) {
  $usuarioDao->delete($id);
}
//Chamando o método delete para deletar tanto do sistema quanto do banco de dados.

header("Location: index.php");
exit;