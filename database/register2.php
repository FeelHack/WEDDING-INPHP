<?php session_start();
    require "mainDatabase.php";
    $conn=DataBaseConnection::getMysqlConnection();
   
    $sql="update users set DATEOFBIRTH=:DATEOFBIRTH,mobileno=:mobileno,religion=:religion,mothertongue=:mothertongue,countrylivingin=:countrylivingin where profileid=:id";
    $pst=$conn->prepare($sql);
       
        $pst->bindParam(":DATEOFBIRTH",$_REQUEST["date"]);
        $pst->bindParam(":mobileno",$_REQUEST["mobile"]);
        $pst->bindParam(":religion",$_REQUEST["religion"]);
        $pst->bindParam(":mothertongue",$_REQUEST["mothertongue"]);
        $pst->bindParam(":countrylivingin",$_REQUEST["country"]);
        $_SESSION["country"]=$_REQUEST["country"];
        $pst->bindParam(":id",$_SESSION["id"]);
        $result=$pst->execute();
        
        if($result>0)
        {
            header("location: ../view/registerReligionDetails#register-popup");
        }
        else{
            echo "error";
        }
?>