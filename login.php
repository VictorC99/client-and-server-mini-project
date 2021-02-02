
<?php


// Start PHP session at the beginning 
session_start();

// Create database connection using config file
include_once("db-config.php");

// If form submitted, collect email and password from form
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if a user exists with given username & password
    $result = mysqli_query($mysqli, "select 'username', 'password' from users
        where username='$username' and password='$password'");

    // Count the number of user/rows returned by query 
    $user_matched = mysqli_num_rows($result);

    // Check If user exists, store username in session and redirect to dashboard
    if ($user_matched > 0) {

        $_SESSION["username"] = $username;
        header("location: dashboard.php");
    } else {
        echo "Invalid Credentials <br/><br/>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>

    <title>Login</title>
  
<body>

    <form action="login.php" method="post" name="form1">
        <table width="25%">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form>

    <a href="register.php">Register</a>

</body>

</html>