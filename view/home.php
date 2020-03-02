<?php session_start();
    if($_SESSION["email"]==null)
    {
        header("location: login#login-popup");
    }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Marital an Wedding Category</title>
</head>
<body>
	<?php
		require_once("home_header.php");
		require_once("home_banner.php");
		require_once("home_footer.php");
	?>
</body>
</html>