<?php

class Players
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

    public function verifyEmail($email){
        $this->email = $email;

        $sql = $this->conect->prepare("SELECT email FROM players WHERE email = ?");
        $sql->bindParam(1,$this->email);

        if($sql->execute()){
            $result = $sql->fetch(PDO::FETCH_BOUND);
            return $result;
        }else{
            echo "Erro ao checar email";
        }
    }

    public function register()
    {
        $sql = $this->conect->prepare("INSERT INTO players(email,password,name) VALUES(?,?,?)");
        $sql->bindParam(1,$this->email);
        $sql->bindParam(2,$this->password);
        $sql->bindParam(3,$this->name);

        if($sql->execute()){
            echo "Cadastro Realizado!";
        }else{
            echo "Dados não enviados :(";
        }
    }

    public function readPlayersLogin($email){
        $this->email = $email;

        $sql = $this->conect->prepare("SELECT id, name, password FROM players WHERE email = ?");
        $sql->bindParam(1,$this->email);

        if($sql->execute()){
            $result = $sql->fetch(PDO::FETCH_OBJ);
            return $result;
        }else{
            echo "Erro ao checar dados";
        }
    }
}
?>