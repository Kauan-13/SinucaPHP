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

    public function verifyEmail($email)
    {
        $this->email = $email;

        $sql = $this->conect->prepare("SELECT email FROM players WHERE email = ?");
        $sql->bindParam(1,$this->email);

        try{
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_BOUND);
            return $result;
        }catch(PDOException $e){
            echo "Erro ao checar email ".utf8_encode($e->getMessage());
        }
    }

    public function register()
    {
        $sql = $this->conect->prepare("INSERT INTO players(email,password,name) VALUES(?,?,?)");
        $sql->bindParam(1,$this->email);
        $sql->bindParam(2,$this->password);
        $sql->bindParam(3,$this->name);

        try{
            $sql->execute();
            echo "Cadastro Realizado!";
        }catch(PDOException $e){
            echo "Dados não enviados :( ".utf8_encode($e->getMessage());
        }
    }

    public function readPlayersLogin($email)
    {
        $this->email = $email;

        $sql = $this->conect->prepare("SELECT id, name, password FROM players WHERE email = ?");
        $sql->bindParam(1,$this->email);

        try{
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_OBJ);
            return $result;
        }catch(PDOException $e){
            echo "Erro ao checar dados ".utf8_encode($e->getMessage());
        }
    }

    public function joinGroup($playerId,$groupId)
    { 
        
        $sql = $this->conect->prepare("SELECT groups_id FROM players WHERE id = ?");
        $sql->bindParam(1,$playerId);

        try{
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_OBJ);
            
            $antigoGroupsId = $result->groups_id;

            $sql = $this->conect->prepare("UPDATE players SET groups_id = ? WHERE id = ?");
            
            $groupId = $antigoGroupsId."-".$groupId;

            $sql->bindParam(1,$groupId);
            $sql->bindParam(2,$playerId);

            try{
                $sql->execute();
                echo "Cadastro Realizado!";
            }catch(PDOException $e){
                echo "Erro ao checar dados ".utf8_encode($e->getMessage());
            }
        }catch(PDOException $e){
            echo "Erro ao checar dados ".utf8_encode($e->getMessage());
        }
    }
}
?>