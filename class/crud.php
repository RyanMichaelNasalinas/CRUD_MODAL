<?php 

class Crud {

    // protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function selectAll() {
       $stmt = $this->pdo->prepare("SELECT * FROM users ORDER BY id DESC");
       $stmt->execute();
       $result = $stmt->fetchAll();
    
        return $result;
    }

    public function checkRowCount($statement) {
        if($statement > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function selectUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
         $result = $stmt->fetchAll();
    
        return $result;
      
    }

    public function createData($first_name,$last_name) {    
        $stmt = $this->pdo->prepare("INSERT into users (`first_name`,`last_name`) VALUES (:first_name,:last_name)");
        $stmt->bindParam(":first_name",$first_name,PDO::PARAM_STR);
        $stmt->bindParam(":last_name",$last_name,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateData($first_name,$last_name,$id) {
        $stmt = $this->pdo->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name WHERE id = :id");
        $stmt->bindParam(":first_name",$first_name,PDO::PARAM_STR);
        $stmt->bindParam(":last_name",$last_name,PDO::PARAM_STR);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
    }


    public function deleteData($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }


}

?>

