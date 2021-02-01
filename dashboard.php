<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: login.php");
}
?>

<html>

<body>
<div style="text-align:center">
<B><f=14>WELCOME!

 <br>
 <br>
    <div style="text-align:left">
        <a href="logout.php">Logout</a>
    </div>

</body>

</html>