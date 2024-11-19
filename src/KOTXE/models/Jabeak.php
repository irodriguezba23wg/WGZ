<?php
    namespace Models;
    
    use Config\Database;

    class Jabeak{
        private $db;

        public function __construct(){
            $this->db = Database::getInstance()->getConnection();
        }

        public function getAll(){
            $sql= "SELECT * FROM jabeak";
            $respuesta= $this->db->query($sql);

            $data = [];
            while ($row = $respuesta->fetch_assoc()) {
                $data[] = $row;
            }
            
            return $data;
        }
    }

?>