<?php
   
   class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:host=20.216.41.245;dbname=g7_19","G7_19","dFVSi8q7");
                return $conectar;
            } 
            catch(Exception $e) {
                print "Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
    ?>