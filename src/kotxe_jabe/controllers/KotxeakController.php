<?php
    namespace Controllers;
    
    use Models\Kotxea;
    use Models\Jabeak;

    class KotxeakControllers{
        public function listAll(){
            $kotxea = new Kotxea();
            $lista = $kotxea->getAll();
            $jabeak = new Jabeak();
            $listaJabe = $jabeak->getAll();

            if (empty($lista)) {
                echo "No se encontraron registros en la base de datos.";
                return;
            }

            require_once '../views/Kotxeakbistaratu.php';
        }
        public function updateJabeaId($id,$jabeaId){
            $kotxea = new Kotxea();
            $kotxea->updateJabea($id,$jabeaId);
            $this->listAll();
        }
        public function JabeaEzabatu($id){
            $kotxea = new Kotxea();
            $kotxea->deleteJabea($id);
            $this->listAll();
        }
        public function deleteKotxea($id){
            $kotxea = new Kotxea();
            $kotxea->deleteKotxea($id);
            $this->listAll();
        }
        public function insertKotxeak($idJabea,$matrikula,$matrikula_data,$itv){
            $kotxea = new Kotxea();
            $kotxea->deleteKotxea($idJabea,$matrikula,$matrikula_data,$itv);
            $this->listAll();
        }
    }
?>