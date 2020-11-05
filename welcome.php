<?php
   include('session.php');
?>
<html>

   <head>
	<title>HomePage </title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	$("button").click(function(){
    		$("h3").toggle();
  		});
	});
</script>
   </head>
   <body>
      <div><h1>Welcome <?php echo $login_session; ?></h1>
</div>

	<div>
			  <button>Show My Details</button>
	</div>
	<br><br><br>
	<div>  
			  <h3>
	  <?php
		  $rows;
	   		/*Displaying sql malicious query and its result for demo purpose*/
		  //echo('SQL Query  - '.$_SESSION['sql_query'].'</br>');
		 	//echo('Number of records is '.$_SESSION['count'].'</br>');
		  if(isset($_SESSION['query_result']))
		  {
		  $rows = $_SESSION['query_result'];
	      }
		  
		 for($i=0;$i<count($rows);$i++)
		  {	 print_r($rows[$i]);
			 echo("<br/>");
		  }
		  
		  print_r($rows[1]);
		  ?>

		</h3>
	</div>

	<div>
		<h1 align="right"><a href = "logout.php">Sign Out</a></h1>
	</div>




	<div id="body" align="center">
		<div id="searchbar">
			<form method="POST" class="myForm" >	
				<input type="text" id="searchitem" name="searchitem" placeholder="Search a Name">
				<input type="submit" id="submit" name="Search">
			</form>
		</div>
		<div style="width:100%;">
		<span id="notfound"></span>
		</div>

		<div id="result">
			<ul id="searchresult" type="none">
			<?php
				include("config.php");
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$key = $_POST['searchitem'];

					// Declare a regular expression 
					$regex = '/^[a-zA-Z ]*$/'; 

					if(preg_match($regex, $key)) { 
						//echo("Name string matching with". " regular expression"); 
						
											
					$name = explode(' ', $key, 2); // Break String into Array.
					if(empty($name[1])) {
						$sql = "SELECT * FROM users WHERE firstname = '$name[0]' OR lastname= '$name[0]'";
					} else {
						$sql = "SELECT * FROM users WHERE firstname = '$name[0]' AND lastname= '$name[1]'";
					}
					$query = mysqli_query($db, $sql);
					if(!$query){
						echo mysqli_error($db);
					}
					if(mysqli_num_rows($query) == 0){
						echo "User ".$key." not found.";
						
					} 
					else{
						while($row = mysqli_fetch_assoc($query)){
							echo $row['id'] ;
							echo "<div id=\"uname\">".$row['username']."</div>";
							echo '<br>';
						}
					}
				}
				else { 
					echo("Only letters and white space". " allowed in name string"); 
					} 
				}
			?>
		</div>
		
	</div>
	






	</body>
</html>
