<?php 
    class Id
    {
        public static function checkId($email)
        {
            $conn=DataBaseConnection::getMysqlConnection();
            $sql="select profileid from users where emailid=:email";
            
            $pst=$conn->prepare($sql);
            $pst->bindParam(":email",$email);
            $pst->execute();
            $profileid=0;
            if($row=$pst->fetch())
            {
                $GLOBALS["profileid"]=$row["profileid"];
                $_SESSION["id"]=$row["profileid"];

                    $sql1="insert into newimage(emailid,profileid) values(:email,:id)";
                    $pst1=$conn->prepare($sql1);
                    $pst1->bindParam(":email",$GLOBALS["email"]);
                    $pst1->bindParam(":id",$GLOBALS["profileid"]);
                    $pst1->execute();
                    
                    $query1="insert into religion_detail(emailid,profileid) values(:email,:id)";
                    $stm1=$conn->prepare($query1);
                    $stm1->bindParam(":email",$GLOBALS["email"]);
                    $stm1->bindParam(":id",$GLOBALS["profileid"]);
                    $stm1->execute();

                    $query2="insert into personal_details(emailid,profileid) values(:email,:id)";
                    $stm2=$conn->prepare($query2);
                    $stm2->bindParam(":email",$GLOBALS["email"]);
                    $stm2->bindParam(":id",$GLOBALS["profileid"]);
                    $stm2->execute();

                    $query3="insert into professional_details(emailid,profileid) values(:email,:id)";
                    $stm3=$conn->prepare($query3);
                    $stm3->bindParam(":email",$GLOBALS["email"]);
                    $stm3->bindParam(":id",$GLOBALS["profileid"]);
                    $stm3->execute();

                    $query4="insert into matches(emailid,profileid) values(:email,:id)";
                    $stm4=$conn->prepare($query4);
                    $stm4->bindParam(":email",$GLOBALS["email"]);
                    $stm4->bindParam(":id",$GLOBALS["profileid"]);
                    $stm4->execute();
                    return 1;
            } 
            else{
                echo "not";
            } 
            return 0;
        }
       
    }
?>