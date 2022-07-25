<?php
    class Estudiantes extends Conectar{

        public function get_Estudiantes(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Estudiante";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_Estudiante($Numero_Alumno){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Estudiante WHERE Numero_Alumno=?";
            $sql=$conectar->prepare($sql);
            $sql->binValue(1,$Numero_Alumno);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_Estudiante($Numero_Alumno,$Nombre,$Apellidos,$Fecha_Nacimiento,$Direccion,$Altura,$Carrera){
            $conectar= parent:: conexion();
            parent::set_names();
            $sql="INSERT INTO Estudiante (Numero_Alumno,Nombre,Apellidos,Fecha_Nacimiento,Direccion,Altura,Carrera)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$Numero_Alumno);
            $sql->bindValue(2,$Nombre);
            $sql->bindValue(3,$Apellidos);
            $sql->bindValue(4,$Fecha_Nacimiento);
            $sql->bindValue(5,$Direccion);
            $sql->bindValue(6,$Altura);
            $sql->bindValue(7,$Carrera);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_Estudiante($Numero_Alumno,$Nombre,$Apellidos,$Fecha_Nacimiento,$Direccion,$Altura,$Carrera){
            $conectar= parent:: conexion();
            parent::set_names();
            $sql="UPDATE Estudiante set Numero_Alumno=$Numero_Alumno, Nombre=$Nombre, Apellidos=$Apellidos, Fecha_Nacimiento=$Fecha_Nacimiento, Direccion=$Direccion, Altura=$Altura, Carrera=$Carrera, WHERE Numero_Alumno=$Numero_Alumno;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$Numero_Alumno);
            $sql->bindValue(2,$Nombre);
            $sql->bindValue(3,$Apellidos);
            $sql->bindValue(4,$Fecha_Nacimiento);
            $sql->bindValue(5,$Direccion);
            $sql->bindValue(6,$Altura);
            $sql->bindValue(7,$Carrera);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_Estudiante($Numero_Alumno){
            $conectar= parent:: conexion();
            parent::set_names();
            $sql="DELETE FROM Estudiante  WHERE Numero_Alumno=$Numero_Alumno;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$Numero_Alumno);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>