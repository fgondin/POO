<?php
require_once 'models/usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {
    private $pdo;

    public function __construct(PDO $driver){
        //__construct usando essa função, o php vai automaticamente cahamar essa função quando ultilizar tal classe. 
        $this->pdo = $driver;
    }

    public function add(Usuario $usuario){
        $sql = $this->pdo->prepare("INSERT INTO tbl_usuarios (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(":nome",$usuario->getNome());
        $sql->bindValue(":email",$usuario->getEmail());
        $sql->execute();
        //Prende os valores no respectivo bando de dados.
        
        $usuario->setId($this->pdo->lastInsertId());
        //Tirar dúvida.
        return $usuario;
    }
    //Função feita para adicionar o usuário ao banco de dados.

    public function findAll(){
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM tbl_usuarios");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach($data as $item){
                $usuario = new Usuario();
                $usuario->setId($item['id']);
                $usuario->setNome($item['nome']);
                $usuario->setEmail($item['email']);
                //"Setando" ou colocando o dado em cada espaço da array coerente a seu nome.
                $array[] = $usuario;
                //Usando a array pra armazenar os dados do usuário.
            }
        }

        return $array;
        //Finalizndo a função fndAll e retornando os valores armazenados.

    }

    public function findByEmail($email){
        $sql = $this->pdo->prepare ("SELECT * FROM tbl_usuarios WHERE email = :email");
        //Perguntar ao professor.
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            $usuario = new Usuario();
            $usuario->setNome($data ['nome']);
            $usuario->setEmail($data['email']);

            return $usuario;
        }else{
            return false;
        }
    }

    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM tbl_usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        //Como o nome diz, função usada para achar o usuário por seu respectivo id.
        if($sql->rowCount() > 0){
            //Rowconunt retorna o número de linhas afetadas pela última instrução.
            $data = $sql->fetch();
            //Fetch retorna uma única row da consulta.
            $usuario = new Usuario();
            $usuario->setId($data['id']);
            $usuario->setNome($data['nome']);
            $usuario->setEmail($data['email']);
                
            return $usuario;
        }else{
            return false;
        }
    }
    public function update (Usuario $suario){
        $sql = $this->pdo->prepare("UPDATE tbl_usuarios SET nome = :nome, email = :email WHERE id = :id");
        //Acesso ao banco de dados, atualizando o usuário de acordo com o id do mesmo.
        $sql->bindValue(':nome',$suario->getNome());
        $sql->bindValue(':email',$suario->getEmail());
        $sql->bindValue(';id',$suario->getId());
        //Prendendo os valores ao banco de dados como bindValue.
        $sql->execute();

        return true;
    }
    //Função ultilizada para atualizar algum usuário existente.

    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM tbl_usuarios WHERE id = :id");
        $sql->bindValue(':id',$id);
        $sql->execute();
    }
    //Função ultilizada para deletar algum usuário existente.
}
?>