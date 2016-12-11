<?
include ("dbconnect.php");

//GETS THE USERNAME AND PASSWORD FROM PREVIOUS PAGE
$username = $_POST["Username"];
$password = $_POST["Password"];


//if ($username =="Username" && $password=="Password")

//{
//    setcookie('access_level_cookie', 'standarduser')
//}


//MYSQL INJECTION PROTECTION
$username = mysqli_real_escape_string($username);
$password = mysqli_real_escape_string($password);

//FIND THE USER IN THE DATABASE
$sql="SELECT * FROM users WHERE Username='". $username ."' and Password='". $password . "'";


//RUN
$result = $db->query($sql);

    $loginSuccessful = 0;
        while($row = $result->fetch_array()) {
            $loginSuccessful = 1;
    }


    // If result matched $username and $password, table row must be 1 row

    if($loginSuccessful==1){

        // Register $myusername, $mypassword and redirect to file "index.php"

    session_start();
    $_SESSION['Username'] = $username;
    header("location:loggedin.php");
    }
        else {
            echo "Wrong Username or Password";
}
?>