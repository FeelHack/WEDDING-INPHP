<?php 
	//require  "../database/mainDatabase.php";
	$conn=DataBaseConnection::getMysqlConnection();
	class Update
	{
		public static function personal_details()
		{
			$sql="select * from personal_details where profileid=:id";
			$pst=$GLOBALS["conn"]->prepare($sql);
			$pst->bindParam(":id",$_SESSION["id"]);
			$pst->execute();
			if($pst->rowCount()>0)
			{
				return 1;
			}
			return 0;

		}
		
		public static function matches()
		{
			$sql="select * from matches where profileid=:id";
			$pst=$GLOBALS["conn"]->prepare($sql);
			$pst->bindParam(":id",$_SESSION["id"]);
			$pst->execute();
			if($pst->rowCount()>0)
			{
				return 1;
			}
			return 0;
		}
		
		public static function religion_detail()
		{
			$sql="select * from religion_detail where profileid=:id";
			$pst=$GLOBALS["conn"]->prepare($sql);
			$pst->bindParam(":id",$_SESSION["id"]);
			$pst->execute();
			if($pst->rowCount()>0)
			{
				return 1;
			}
			return 0;
		}
		public static function professional_details()
		{
			$sql="select * from professional_details where profileid=:id";
			$pst=$GLOBALS["conn"]->prepare($sql);
			$pst->bindParam(":id",$_SESSION["id"]);
			$pst->execute();
			if($pst->rowCount()>0)
			{
				return 1;
			}
			return 0;
		}
	}
?>