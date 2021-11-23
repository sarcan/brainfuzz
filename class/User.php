<?php
// Class to register and login a User

class User {
    /* Connection Database */
    protected $connection;

    /* Constructor */
    public function __construct (PDO $connection) {
        $this -> connection = $connection;
    }

    /* Login */
    public function fetch($sql, $parameter = array()) {
        $stmt = $this -> connection -> prepare($sql);
        $stmt -> execute($parameter);
        $result = $stmt -> fetchAll();
        return $result;
    }  

    /* Check Input with Database */
    // Select from Database
    // Create a Prepared Statement
    // Execute Prepared Statement
    public function loginUser($user) {
        $query = "SELECT * From users WHERE email = :email";
        $stmt = $this -> connection -> prepare($query);
        $stmt -> execute(["email" => $user]);
        $checkedUser = $stmt -> fetch();
        return $checkedUser;
    }

    /* Check Username */
    // Select from Database
    // Create a Prepared Statement
    // Execute Prepared Statement
    public function checkName($name) {
        $query = "SELECT * FROM users WHERE name = :name";
        $stmt = $this -> connection -> prepare($query);
        $stmt -> execute(["name" => $name]);
        $checkedUser = $stmt -> fetch();
        return $checkedUser;
    }

    /* Compare the email adress */
    // Select from Database
    // Create a Prepared Statement
    // Execute Prepared Statement
    public function checkEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this -> connection -> prepare($query);
        $stmt -> execute(["email" => $email]);
        $checkedUser = $stmt -> fetch();
        return $checkedUser;
    }

    /* Check Database for ID */
    // Select from Database
    // Create a Prepared Statement
    // Execute Prepared Statement
    public function getData($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this -> connection -> prepare($query);
        $stmt -> execute(["id" => $id]);
        $checkedUser = $stmt -> fetch();
        return $checkedUser;
    }

    /* Registration */
    // Insert into Database
    // Create a Prepared Statement
    // Execute Prepared Statement
    public function register($array) {
        $query = "INSERT INTO `users` (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this -> connection -> prepare($query);
        $stmt -> execute($array);
    }

    /* Update Account */
    public function updateAccount($name, $email, $id) {
		$query = "UPDATE `users` SET ";
		$query .= "name = :name, ";
		$query .= "email = :email ";
		$query .= "WHERE id = :id";
		$stmt = $this -> connection -> prepare($query);
		$stmt -> bindParam(':id', $id, PDO::PARAM_INT);
		$stmt -> bindParam(":name", $name);
        $stmt -> bindParam(":email", $email);
        // print_r($stmt);
		$stmt -> execute();
	}
};
?>