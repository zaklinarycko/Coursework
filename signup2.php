<?

//Includes the Database connection script
include ("dbconnect.php");
//GETS THE USERNAME AND PASSWORD FROM PREVIOUS PAGE
$username = $_POST["username"];
$password = $_POST["password"];
$passwordcheck = $_POST["passwordcheck"];
$email = $_POST["email"];

if ($password==$passwordcheck)
{
$sql = "INSERT INTO users (Username, Password, Email, AccessID) VALUES ('". $Username ."', '" .$Password."', '".$Email."', 'ID')";
if (mysqli_query($db, $sql)) {
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
session_start();
$_SESSION['Username'] = $Username;
header("location:index.php");
$sql = "INSERT INTO users (Username, Password, Email, AccessID) VALUES ('". $Username ."', '" .$Password."', '".$Email."', 'ID')";
}
else
{
echo "Passwords do not match";
}
?>