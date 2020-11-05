<?php  include("config.php");	/*for db connection*/
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>

<body>
    <h1 align="center">Register Page</h1><br><br><br>


        <form name="registerform" method="POST" action="">

            <table align="center">

            <tr>
                    <td><label>First Name:</label></td>
                    <td><input type="text" name="fname" id="fname" placeholder="Enter First Name" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>

                <tr>
                    <td><label>Last Name:</label></td>
                    <td><input type="text" name="lname" id="lname" placeholder="Enter Last Name" required>
    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td><label>UserName:</label></td>
                    <td><input type="text" name="username" size="30"></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="text" name="useremail" size="30"></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                <tr>
                    <td><label>Phone:</label></td>
                    <td><input type="text" name="phone" size="30"></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <td><label>Password:</label></td>
                <td><input type="password" name="password" size="30"></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"> <input type="submit" name="submit" value="Submit"> </td>
                </tr>
            </table>

</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userfirstname = $_POST['fname'];
        $userlastname = $_POST['lname'];
        $userusername = $_POST['username'];
        $userpassword = $_POST['password'];
        $useremail = $_POST['useremail'];
        // Check for Some Unique Constraints
        /*
        $query = mysqli_query($conn, "SELECT user_username, user_email FROM users WHERE user_username = '$userusername' OR user_email = '$useremail'");
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            if($userusername == $row['user_username'] && !empty($userusername)){
                ?> <script>
                document.getElementsByClassName("required")[0].innerHTML = "This Username already exists.";
                </script> <?php
            }
            if($useremail == $row['user_email']){
                ?> <script>
                document.getElementsByClassName("required")[0].innerHTML = "This Email already exists.";
                </script> <?php
            }
        }
        */
        // Insert Data
        $sql = "INSERT INTO users(firstname, lastname, username, email, password) VALUES ('$userfirstname', '$userlastname', '$userusername', '$useremail', '$userpassword')";
        $query = mysqli_query($db, $sql);
        if($query){
            /*$query = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email = '$useremail'");
            $row = mysqli_fetch_assoc($query);
            $_SESSION['user_id'] = $row['user_id'];
            header("location:home.php");
            */
            echo "registered";
            sleep(3);
             
        }
        header("location:index.php");
            
    }
?>


</body>

</html>