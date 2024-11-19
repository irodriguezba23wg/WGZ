<?php
    namespace Models;
    
    use Config\Database;

    class Kotxea{
        private $db;

        public function __construct(){
            $this->db = Database::getInstance()->getConnection();
        }

        public function getAll(){
            $sql= "SELECT * FROM kotxeak";
            $respuesta= $this->db->query($sql);

            $data = [];
            while ($row = $respuesta->fetch_assoc()) {
                $data[] = $row;
            }
            
            return $data;
        }
        public function updateJabea($id,$idJabea){
            $sql = "UPDATE kotxeak SET jabea_id = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ii", $idJabea, $id);
            $stmt->execute();
        }
        public function deleteJabea($id){
            $sql = "UPDATE kotxeak SET jabea_id = NULL WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
        }
        public function deleteKotxea($id){
            $sql = "DELETE from kotxeak WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
        }
        public function insertKotxea($idJabea,$matrikula,$matrikula_data,$itv){
            $sql = "INSERT INTO kotxeak (jabea_id,matrikula,matrikulazio_data,itv) VALUES (?,?,?,?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("issi",$idJabea,$matrikula,$matrikula_data,$itv);
            $stmt->execute();
        }
    }

?>