<?php

class Groups
{
    private $conect;

    private $groupName;
    private $adminPlayerId;

    function __construct($conn)
    {
        $this->conect = $conn;
    }

    public function setData($groupName, $adminPlayerId)
    {
        $this->groupName = $groupName;
        $this->adminPlayerId = $adminPlayerId;
    }

    public function registerGroup()
    {
        $sql = $this->conect->prepare("INSERT INTO table_groups(name_group,admin_player_id) VALUES(?,?)");
        $sql->bindParam(1,$this->groupName);
        $sql->bindParam(2,$this->adminPlayerId);

        try{
            $sql->execute();
        }catch(PDOException $e){
            echo "Dados não enviados :( ".utf8_encode($e->getMessage());
        }
    }

    public function getId($groupName)
    {
        $sql = $this->conect->prepare("SELECT id FROM table_groups WHERE name_group = ?");
        $sql->bindParam(1,$groupName);

        try{
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_OBJ);
            return $result;
        }catch(PDOException $e){
            echo "Erro ao checar dados ".utf8_encode($e->getMessage());
        }
    }
}