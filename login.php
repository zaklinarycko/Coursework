<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/main.css"/>

</head>

<body>

<?
session_start();

include ("dbconnect.php");

//check if username session is set

if (isset($_SESSION['Username'])) //exists
{
    echo "<p>Hello " . $_SESSION['username'] . "</p>";
    $sql = "SELECT * FROM users WHERE Username='". $_SESSION['Username'] . "'";
    $result = $db->query($sql);
    while($row = $result->fetch_array())
    {
        echo "<p> User type is" . $row['userType']. "</p>";
    }
    ?>
    <a href="logout.php">Logout</a>
    <?
}
else //SESSION DOESNT EXIST
{
    ?>
    <h1>My Login Form</h1>
    <form method="post" action="checklogin.php">
        <p><input type="text" name="username" value="" placeholder="Username or Email"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
    </form>
    <?
}
?>


<div id="left" class="column">
    <ul>
        <img src="header.jpg" alt="Main Image" style="width:200px;height:200px;">
        <li><a href="welcome.php">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="clubs.html">Clubs</a></li>
        <li><a href="news.html">News</a></li>
        <li><a href="login.php">Log In</a></li>

    </ul>
</div>
<div id="container">
    <div id="center" class="column">


    </div>

    <div id="footer"> Page designed and created by Zaklina Rycko,Cara Henderson, Sarah Thomson, Sarah Valentine and Lucy Axford</div>

</div>



</body>
</html>