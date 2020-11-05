
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuggyApp</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<h1 align="center">Login</h1>
<br><br>


<form name="loginform" method="POST" action="">

    <table align="center">
    
    <tr>
    <td><label>User ID:</label></td>
    <td><input type="text" name="username" size="30"></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
    <td><label>Password:</label></td>
    <td><input type="password" name="password" size="30"></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    
    <tr><td colspan="2" align="center">  <input type="submit" name="submit" value="Submit" onclick="formValidation"> </td></tr></table>
    
    </form>


    <?php
   include("config.php");	/*for db connection*/
   session_start(); 		/*to store valid username into session instance*/
   $error="";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
				
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      
      
      $regex = '/^[a-zA-Z0-9 ]*$/'; 

		if(preg_match($regex, $myusername)&&preg_match($regex, $mypassword)) {
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $sql= str_replace("\'","'",$sql);		/*to escape blanks and spaces from input*/
      $result = mysqli_query($db,$sql);		
      $count = mysqli_num_rows($result);
      $username_find_flag=false;
      $password_correct_flag=false;
      $query_result=array();
      while( $rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
				  foreach($rows as $row)
			  {		echo $row;
					echo "<br>";
					   $query_result[]=$row;
					if(strcmp($row,$myusername))
					  {
					  $username_find_flag=true;
					  }
					  if(strcmp($row,$mypassword))
					  {
					  $password_correct_flag=true;
					  }
			  }
			
	  }


      if($username_find_flag and $password_correct_flag)
      {
		  $_SESSION['login_user'] = $myusername;
		  $_SESSION['sql_query'] = $sql;
		  $_SESSION['count'] = $count;
		  $_SESSION['query_result'] = $query_result;
		  //echo $_SESSION['login_user'];
		  echo $myusername;
         header("location: welcome.php");
	  }
	  else{
		  $error = "Your Login Name or Password is invalid";
		  }


      }

      else{
         echo"Bad input";
      }
      // sql injection proof code

     /* if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }*/



   }
?>

    <div><p><?php echo $error; ?></p></div>
</body>

</html>
