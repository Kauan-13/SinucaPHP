<?php

class Player
{
    private $conect;

    private $email;
    private $password;
    private $name;

    function __construct($conn){
        $this->conect = $conn;
    }
    
    public function setData($email,$password,$name)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    public function register()
    {
        $sql = $this->conect->prepare("INSERT INTO player(email,password,name) VALUES(?,?,?)");
        $sql->bindParam(1,$this->email);
        $sql->bindParam(2,$this->password);
        $sql->bindParam(3,$this->name);

        if($sql->execute()){
            echo "Cadastro Realizado!";
        }else{
            echo "Dados não enviados :(";
        }
    }

}
?>