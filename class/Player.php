<?php

class Player
{
    private $conect;

    private $id;
    private $nome;

    function __construct($conn){
        $this->conect = $conn;
    }
    
    public function setData($id,$nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }

    public function register()
    {
        $sql = $this->conect->prepare("INSERT INTO player(id,name) VALUES(?,?)");
        $sql->bindParam(1,$this->id);
        $sql->bindParam(2,$this->nome);

        if($sql->execute()){
            echo "Cadastro Realizado!";
        }else{
            echo "Dados não enviados :(";
        }
    }

}


?>