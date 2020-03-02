<?php
    class DataBaseConnection
    {
        public static function getMysqlConnection()
        {
            try{
                $conn=new PDO("mysql:host=localhost;dbname=matrimony_db","root","");
                 return $conn;
                 
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
    }
   

?>