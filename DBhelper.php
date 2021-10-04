<?php
    include 'user.php';

    

    class DBhelper {
        public $conn;
        public $servername= "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "btu";


        function __construct() {
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
            if(!$this->conn) {
                die("Connection Failed: " + mysqli_connect_error());
            }
        }

        public function get_users(){
            $users = array();

            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($this->conn, $sql);

            while($row = $result->fetch_assoc()){
                $user = new user($row["id"], $row["name"], $row["surname"], $row["birthday"], $row["registered_at"]);
                array_push($users, $user);

            }
            return $users;
        }

        public function delete_user($id){
            $sql = "DELETE FROM `users` WHERE id=".$id;
            mysqli_query($this->conn, $sql);
        }

        public function get_user_for_update($id){
            $users = array();

            $sql = "SELECT * FROM `users` WHERE id = ".$id;
            $result = mysqli_query($this->conn, $sql);

            while($row = $result->fetch_assoc()){
                $user = new user($row["id"], $row["name"], $row["surname"], $row["birthday"], $row["registered_at"]);
                array_push($users, $user);

            }
            return $users;
        }

        public function update_user($user){
            $sql = "UPDATE `users` SET 
            `name`='".$user->get_name(). "',
            `surname`='".$user->get_surname(). "',
            `birthday`='".$user->get_birthday(). "' 
            WHERE id=".$user->get_id();
            mysqli_query($this->conn, $sql);
        }

        public function create_user($user){
            $sql = "INSERT INTO `users`(`name`, `surname`, `birthday`) 
            VALUES ('".$user->get_name(). "','". $user->get_surname(). "','" .$user->get_birthday(). "')";
            mysqli_query($this->conn, $sql);
        }
    }



?>