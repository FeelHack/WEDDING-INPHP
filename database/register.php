<?php session_start(); 
    require "mainDatabase.php";
    $conn=DataBaseConnection::getMysqlConnection();
     $sql="insert into users(MATRIMONYPROFILEFOR,NAME,profile,EMAILID,gender,PASSWORD) values(:MATRIMONYPROFILEFOR,:NAME,:profile,:EMAILID,:gender,:PASSWORD)";
     $pst=$conn->prepare($sql);
     
     $pst->bindParam(":MATRIMONYPROFILEFOR",$_REQUEST["profile"]);
     $_SESSION["profile"]=$_REQUEST["profile"];
     $pst->bindParam(":NAME",$_REQUEST["name"]);
     $filename=$_FILES["img"]["name"];
     $file_temp=$_FILES["img"]["tmp_name"];
     $filetype=$_FILES["img"]["type"];
     $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed))
        {
            $_SESSION["msg"]="Upload Valide File";
            header("location: ../view/register#register-popup");
        }
        else{
            $folder="../profileImage/".$filename;
            move_uploaded_file($file_temp,$folder);
            $pst->bindParam(":profile",$folder);
        }
            $pst->bindParam(":EMAILID",$_REQUEST["email"]);
            require "../checkdatabase/checkemail.php";
            $email=$_REQUEST["email"];
            $_SESSION["email"]=$_REQUEST["email"];
            $check=EmailCheck::checkEmail($email);
            if($check>0)
            {
                $_SESSION["msge"]="This Email Alrady Exit";
                header("location: ../view/register#register-popup");   
            }    
            else{
                
                $pst->bindParam(":gender",$_REQUEST["gender"]);
                $_SESSION["gender"]=$_REQUEST["gender"];
                $pst->bindParam(":PASSWORD",$_REQUEST["password"]);
               
                    if($pst->execute())
                    {
                        require_once("../checkdatabase/sessionid.php");
                        $id=Id::checkId($email);
                        if($id>0)
                        {
                             header("location: ../view/register2#register-popup");
                        }
                        else
                        {
                            echo "not";
                        }
                    } 
                    
                
               
            }
        
            
?>