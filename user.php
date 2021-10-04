<?php
    class user{
        public $id;
        public $name;
        public $surname;
        public $birthday;
        public $registered_at;

        function __construct($id, $name, $surname, $birthday, $registered_at){
            $this->id=$id;
            $this->name=$name;
            $this->surname=$surname;
            $this->birthday=$birthday;
            $this->registered_at=$registered_at;

        }

        function print(){
            ?>
            <td><?=$this->name?></td>
            <td><?=$this->surname?></td>
            <td><?=$this->birthday?></td>
            <?php
        }

        function get_id(){
            return $this->id;
        }

        function get_name(){
            return $this->name;
        }

        function get_surname(){
            return $this->surname;
        }

        function get_birthday(){
            return $this->birthday;
        }
    }

?>