<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["userid"]))  
 {  
      echo '<h3>Login Success, Welcome - '.$_SESSION["userid"].'</h3>';  
      echo '<br /><br /><a href="logout.php">Logout</a>';  
 }  
 else  
 {  
      header("location:/view/login.php");  
 }  
 ?>  