<?php session_start();
    require "mainDatabase.php";
    $conn=DataBaseConnection::getMysqlConnection();

    $sql="update  religion_detail set CAST=:CAST,SUBCAST=:SUBCAST,GOTHRA=:GOTHRA,DOSH_No_YES_DONTKNOW=:DOSH_No_YES_DONTKNOW,DOSH_YES_MANGLIK=:DOSH_YES_MANGLIK,DOSH_YES_SARPADOSH=:DOSH_YES_SARPADOSH,DOSH_YES_KALASARAPSOSH=:DOSH_YES_KALASARAPSOSH,DOSH_YES_RAHUDOSH=:DOSH_YES_RAHUDOSH,DOSH_YES_KETHUDOSH=:DOSH_YES_KETHUDOSH,DOSH_YES_KALATHRADOSH=:DOSH_YES_KALATHRADOSH,PROFILEID=:id where emailid=:email ";
    $pst=$conn->prepare($sql);
        
        $pst->bindParam(":CAST",$_REQUEST["cast"]);
        $pst->bindParam(":SUBCAST",$_REQUEST["subcast"]);
        $pst->bindParam(":GOTHRA",$_REQUEST["gothram"]);
        $pst->bindParam(":DOSH_No_YES_DONTKNOW",$_REQUEST["dosh"]);
        $pst->bindParam(":DOSH_YES_MANGLIK",$_REQUEST["manglik"]);
        $pst->bindParam(":DOSH_YES_SARPADOSH",$_REQUEST["sarpadosh"]);
        $pst->bindParam(":DOSH_YES_KALASARAPSOSH",$_REQUEST["Kalasarapsosh"]);
        $pst->bindParam(":DOSH_YES_RAHUDOSH",$_REQUEST["rahudosh"]);
        $pst->bindParam(":DOSH_YES_KETHUDOSH",$_REQUEST["Kethudosh"]);
        $pst->bindParam(":DOSH_YES_KALATHRADOSH",$_REQUEST["kalathradosh"]);
        $pst->bindParam("id",$_SESSION["id"]);
        $pst->bindParam(":email",$_SESSION["email"]);
        if($pst->execute())
        {
            header("location: ../view/registerPersonalDetails#register-popup");
        }
        else
        {
            echo "error";
        }
?>