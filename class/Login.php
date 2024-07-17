<?php

class Login
{
    private $conect;

    private $mail;
    private $pass;

    function __construct($conn){
        $this->conect = $conn;
    }
    
    public function setData($mail,$pass)
    {
        $this->mail = $mail;
        $this->pass = $pass;
    }

    public function register()
    {
        $sql = $this->conect->prepare("INSERT INTO login(mail,pass) VALUES(?,?)");
        $sql->bindParam(1,$this->mail);
        $sql->bindParam(2,$this->pass);

        if($sql->execute()){
            echo "Cadastro Realizado!";
        }else{
            echo "Dados não enviados :(";
        }
    }

    public function readIDLogin()
    {
        $sql = $this->conect->prepare("SELECT id FROM login WHERE mail = ?");
        $sql->bindParam(1,$this->mail);

        if($sql->execute()){
            $result = $sql->fetch(PDO::FETCH_OBJ);
            return $result;
        }else{
            echo "Algo Deu Errado";
        }
    }

}



?>