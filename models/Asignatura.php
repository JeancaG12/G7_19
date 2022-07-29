<?php

    class Asignaturas extends Conectar{
        public function get_asignaturas(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM asignatura ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_asignatura($codigoAsignatura){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM asignatura WHERE CodigoAsignatura = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigoAsignatura);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_asignatura($codigoAsignatura, $nombreAsignatura, $carrera, $fechaCreacion, $unidadesVal, $promedioAprob, $numEdificio){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO asignatura(CodigoAsignatura, NombreAsignatura, Carrera, FechaCreacion, UnidadesVal, PromedioAprob, NumeroEdificio)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigoAsignatura);
            $sql->bindValue(2, $nombreAsignatura);
            $sql->bindValue(3, $carrera);
            $sql->bindValue(4, $fechaCreacion);
            $sql->bindValue(5, $unidadesVal);
            $sql->bindValue(6, $promedioAprob);
            $sql->bindValue(7, $numEdificio);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_asignatura($codigoAsignatura, $nombreAsignatura, $carrera, $fechaCreacion, $unidadesVal, $promedioAprob, $numEdificio){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE asignatura SET NombreAsignatura=?, Carrera=?, FechaCreacion=?, UnidadesVal=?, PromedioAprob=?, NumeroEdificio=? WHERE CodigoAsignatura=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombreAsignatura);
            $sql->bindValue(2, $carrera);
            $sql->bindValue(3, $fechaCreacion);
            $sql->bindValue(4, $unidadesVal);
            $sql->bindValue(5, $promedioAprob);
            $sql->bindValue(6, $numEdificio);
            $sql->bindValue(7, $codigoAsignatura);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_asignatura($codigoAsignatura){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE FROM asignatura WHERE CodigoAsignatura = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigoAsignatura);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>