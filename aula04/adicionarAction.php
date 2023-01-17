<?php
require 'config.php';
require 'dao/usuarioDaoMysql';

$usuarioDao = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
//INPUT_POST para que o login e o email sejam enviados para o banco de dados.
//FILTER_VALIDATE_EMAIL usado para verificar se o email já existe.

if($name && $email){
//O programa só irá começar a funcionar se o email e o nome forem digitados.

    if($usuarioDao->findByEmail($email) === false){
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);
        //Se por acaso o programa não achar o emial no banco de dados, ele irá prosseguir normalmente.

        $usuarioDao->add($novoUsuario);

        header("Location: index.php");
        exit;
    } else {
        echo 'Else do if usuarioDAO';
        // header("Location: cadastrar.php");
        // exit;
    }
} else {
    echo "nome $name e email $email";
    echo 'Else do usuario e email';
    // header ("Location: cadastrar.php");
    // exit;
}