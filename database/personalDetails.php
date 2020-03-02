<?php session_start();
    require "mainDatabase.php";
    $conn=DataBaseConnection::getMysqlConnection();
    $sql="update  personal_details set marital_status=:marital_status,marital_status_numberofchildren=:marital_status_numberofchildren,marital_status_with_or_not=:marital_status_with_or_not,height=:height,age=:age,family_status=:family_status,family_type=:family_type,family_values=:family_values,any_disability=:any_disability,profileid=:id where emailid=:email";
      $pst=$conn->prepare($sql);
        $pst->bindParam(":marital_status",$_REQUEST["maritalstatus"]);
        $pst->bindParam(":marital_status_numberofchildren",$_REQUEST["children"]);
        $pst->bindParam(":marital_status_with_or_not",$_REQUEST["childrenwith"]);
        $pst->bindParam(":height",$_REQUEST["height"]);
        $pst->bindParam(":age",$_REQUEST["age"]);
        $pst->bindParam(":family_status",$_REQUEST["Family_Status"]);
        $_SESSION["Family_Status"]=$_REQUEST["Family_Status"];
        $pst->bindParam(":family_type",$_REQUEST["familytype"]);
        $_SESSION["familytype"]=$_REQUEST["familytype"];
        $pst->bindParam(":family_values",$_REQUEST["Family_Values"]);
        $_SESSION["Family_Values"]=$_REQUEST["Family_Values"];
        $pst->bindParam(":any_disability",$_REQUEST["disability"]);
        $pst->bindParam(":id",$_SESSION["id"]);
        $pst->bindParam(":email",$_SESSION["email"]);
        if($pst->execute())
        {
            header("location: ../view/registerProfessionalDetails#register-popup");
        }
        else
        {
            echo "error";
        }
    
?>