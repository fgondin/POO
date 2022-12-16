<?php

Class Calculadora {
    public $total;
    //Public é um modificador de acesso, entre eles "public" é o modificador de acesso mais permissivo.

    //"total" é um atributo, ou seja, uma variável contida na classe, a qual a mesma pode armazenar.

    //A diferença entre atributo é método é que o atributo é a propriedade do objeto e o método é a ação que o mesmo pode realizar.
    public function add($num){
        $this->total=$this->total + $num;
        //O que foica entre parênteses se chama parâmetro, ou seja, é o modificador que vai nos dar o modificador que precisamos.
    }

    public function sub($num){
        $this->total=$this->total - $num;
    }

    public function multiply($num){
        $this->total=$this->total * $num;
    }

    public function divide($num){
        $this->total=$this->total / $num;
    }

    public function clear(){
        $this->total="";
    }
}
