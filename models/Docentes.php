<?php

    class Docentes extends Conectar{

        public function get_Docentes(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM docente";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_Docente($Numero_Docente){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM docente WHERE Numero_Docente=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$Numero_Docente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_Docente($Numero_Docente,$Nombre,$Apellidos,$Fecha_Contratacion,$Direccion,$Salario,$Profesion){
            $conectar= parent:: conexion();
            parent::set_names();
            $sql="INSERT INTO docente (Numero_Docente,Nombre,Apellidos,Fecha_Contratacion,Direccion,Salario,Profesion)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$Numero_Docente);
            $sql->bindValue(2,$Nombre);
            $sql->bindValue(3,$Apellidos);
            $sql->bindValue(4,$Fecha_Contratacion);
            $sql->bindValue(5,$Direccion);
            $sql->bindValue(6,$Salario);
            $sql->bindValue(7,$Profesion);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_Docente($Numero_Docente,$Nombre,$Apellidos,$Fecha_Contratacion,$Direccion,$Salario,$Profesion){
            $conectar= parent:: conexion();
            parent::set_names();
            $sql="UPDATE docente set Numero_Docente=$Numero_Docente, Nombre=$Nombre, Apellidos=$Apellidos, Fecha_Contratacion=$Fecha_Contratacion, Direccion=$Direccion, Salario=$Salario, Profesion=$Profesion, WHERE Numero_Docente=$Numero_Docente;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$Numero_Docente);
            $sql->bindValue(2,$Nombre);
            $sql->bindValue(3,$Apellidos);
            $sql->bindValue(4,$Fecha_Contratacion);
            $sql->bindValue(5,$Direccion);
            $sql->bindValue(6,$Salario);
            $sql->bindValue(7,$Profesion);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_Docente($Numero_Docente){
            $conectar= parent:: conexion();
            parent::set_names();
            $sql="DELETE FROM docente  WHERE Numero_Docente=$Numero_Docente;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$Numero_Docente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>