<?php 
    include_once("connect.php");
	session_start();
	//include('top.php');
?>
<?php
      $username=$_POST['admno'];
	  $password=$_POST['pass'];
	  
	  $sql="SELECT COUNT(*) FROM reg_user WHERE(adm_no='".$username."' and pass='".$password."')";
	  
	  $query=mysql_query($sql);
	  
	  $result=mysql_fetch_array($query);
	  
	  if($result[0]>0){
	      #echo "Successful Login!";
		  $_SESSION['userName']=$username;
		  echo"<center><h1>Welcome ".$_SESSION['userName']."!</h1></center><hr/>";
		  echo "<br/><a href='logout.php' style='color:red; padding-right:50px;'>LogOut</a>";
		  echo "<center><br/><h1><a href='popquiz.htm' style='color:red; padding-right:50px;'>Click To Start Quiz</a></h1></center>";
		  #echo "<center><br/><a href='fetchdata.php'>View Student Record</a></center>";
		  
	  }
	  else{
	     echo "Login Failed";
	  }
?>