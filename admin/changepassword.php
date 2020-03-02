<?php session_start();
    $email="Admin@gmail.com";
    require "../database/mainDatabase.php";
    $conn=DataBaseConnection::getMysqlConnection();
    $sql="update Admin set password=:pass where email=:email";
    $pst=$conn->prepare($sql);
    $pst->bindParam(":pass",$_REQUEST["password"]);
    $pst->bindParam(":email",$email);
    if($pst->execute())
    {
        $_SESSION["sucess"]="Password Change SucessFully Login Again";
        header("location: ../view/login#login-popup");
    }
?>