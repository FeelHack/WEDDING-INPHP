<?php session_start();
    if($_SESSION["email"]==null)
    {
        header("location: login#login-popup");
    }

?>

<?php require_once("home_header.php")?>
<style>
    .i{
        width: 200px;
    }
</style>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
      <ul>
        <a href="home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Profile</li>
      </ul>
   </div>
  <div class="col-md-9 profile_left1">
  	
 
</div> 
<div class="col-md-3 match_right">
	<div class="profile_search1">
	   <form action="searchid" method="post">
		  <input type="text" class="m_1" name="id" required="" placeholder="Enter Profile By Name :">
		  <input type="submit" value="Go" name="idsearch">
	   </form>
   </div>
  </div>
</div>
<?php require "home_footer.php"?>