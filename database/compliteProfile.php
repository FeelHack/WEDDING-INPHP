<?php session_start();
    require "mainDatabase.php";
    $conn=DataBaseConnection::getMysqlConnection();
    $sql="update matches set BODYTYPE=:BODYTYPE,WEIGHT=:WEIGHT,COLLEGE=:COLLEGE,EATINGHABIT=:EATINGHABIT,DrinkingHabit=:DrinkingHabit,SmokingHabit=:SmokingHabit,Raasi=:Raasi,Time_of_Birth=:Time_of_Birth,Place_of_Birth=:Place_of_Birth,Father_Status=:Father_Status,Mother_Status=:Mother_Status,Brothers=:Brothers,Sister=:Sister,Parent_Contact_No=:Parent_Contact_No,PROFILEID=:id where emailid=:email";
    $pst=$conn->prepare($sql);
    $pst->bindParam(":BODYTYPE",$_REQUEST["body"]);
    $pst->bindParam(":WEIGHT",$_REQUEST["weight"]);
    $pst->bindParam(":COLLEGE",$_REQUEST["college"]);
    $pst->bindParam(":EATINGHABIT",$_REQUEST["Eating"]);
    $pst->bindParam(":DrinkingHabit",$_REQUEST["Drinking"]);
    $pst->bindParam(":SmokingHabit",$_REQUEST["Smoking"]);
    $pst->bindParam(":Raasi",$_REQUEST["Raasi"]);
    $pst->bindParam(":Time_of_Birth",$_REQUEST["date"]);
    $pst->bindParam(":Place_of_Birth",$_REQUEST["country"]);
    $pst->bindParam(":Father_Status",$_REQUEST["FatherStatus"]);
    $pst->bindParam(":Mother_Status",$_REQUEST["MotherStatus"]);
    $pst->bindParam(":Brothers",$_REQUEST["Brothers"]);
    $pst->bindParam(":Sister",$_REQUEST["sister"]);
    $pst->bindParam(":Parent_Contact_No",$_REQUEST["no"]);
    $pst->bindParam(":id",$_SESSION["id"]);
    $pst->bindParam("email",$_SESSION["email"]);
    if($pst->execute())
    {
        header("location: ../view/home");
    }
    else
    {
        echo "error";
    }
?>