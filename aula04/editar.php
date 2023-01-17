<?php
require 'config.html';
require 'head.html';
require 'header.html';
require 'dao/usuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$usuario = false;
$id = filter_input(INPUT_GET, 'id');
//Tirar dúvida sobre a lógica.

if($id){
  $usuario = $usuarioDao->findById($id);
}


if($usuario === false){
  header("Location: index.php");
  exit;
}

?>

<div>
  <h1>Editar Usuário</h1>
</div>

<form action="editarAction.php" method="post" class="mb-4">
  <input type="hidden" name="id" value="<?=$usuario->getId();?>">
  <div class="mb-3">
    <label for="" class="form-label">
      Nome:
      <input type="text" name="name" class="form-control" value="<?=$usuario->getNome();?>">
    </label>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">
      Email:
      <input type="email" name="email" class="form-control" value="<?$usuario->getEmail();?>">
    </label>
  </div>

  <input type="submit" value="btn btn-primary" name="Salvar" value="Salvar">

</form>

<?php include 'footer.php'; ?>