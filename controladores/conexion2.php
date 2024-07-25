<?php

    class DataBase{
        //propiedades
        private $hostname="127.0.0.1";//direccion del motor de la base de datos
        private $database="inicio";//nombre de la base de datos
        private $username="root";//nombre de la base de datos
        private $password="";//nombre de la base de datos
        private $charset="utf8";//nombre de la base de datos

        function conectar()
        {
            try{
                $conexion= "mysql:host=".$this->hostname."; dbname=".$this->database."; charset=".$this->charset; 
                $options=[
                    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,//GENERA EXCEPCIONES EN CASO DE ERROR 
                    PDO::ATTR_EMULATE_PREPARES=>false
                ];
                    /*ATTR_EMULATE_PREPARES=>false es una configuracion q evita que las preparaciones que se haran para las consultas no sean emuladas(tienen que ser reales)*/
                //PDO se encarga de mantener la conexión a la base de datos 

                $pdo= new PDO($conexion,$this->username, $this->password, $options);//INSTANCIA

                return $pdo;//Aqui pdo ya tiene la conexion a la bd
            }catch(PDOException $e){
                echo 'erro al conectar: '.$e->getMessage();
                exit;
            }
        }
    }


?>