<?php

class Usuario {
    //Classe é um conjunto de funções.
    private $id;
    private $nome;
    private $email;
    //Private proibe qualquer acesso externo a própria classe a as classes filhas.

    public function getId(){
        return $this->id;
    }
    //Retorna o id quando requisitado.
    public function setId($id){
        $this->id = trim($id);
        //Trim retira todos os espaços da string.
    }
    //Adiciona o id a o objeto.
    public function getNome(){
        return $this->nome;
    }
    //Retorna o usuário quando requisitado.
    public function setNome($nome){
        $this->nome = ucwords(trim($nome));
        //ucwords retorna a primeira letra da string como maiúscula.
    }
    public function getEmail(){
        return $this->email;
    }
    //Retorna o email quando requisitado.
    public function setEmail($email){
        $this->email = strtolower(trim($email));
        //strtolower retorna a string com todas as letras minúsculas.
    }
}

interface UsuarioDAO {
    public function add(Usuario $suario);
    public function findAll();
    public function findByEmail($email);
    public function findById($id);
    public function update(Usuario $suario);
    public function delete($id);
}
//Classes normais podem ser istanciadas, já interfaces não podem conter qualquer tipo de código.
//Interfaces de objetos permitem a criação de códigos que especificam quais métodos uma classe deve implementar, sem definir como esses métodos serão tratados.
?>