<?

//Includes the Database connection script
include ("dbconnect.php");

//GETS THE USERNAME AND PASSWORD FROM PREVIOUS PAGE
$Username = $_POST["Username"];
$Password = $_POST["Password"];
$Passwordcheck = $_POST["Passwordcheck"];
$Email = $_POST["Email"];
$DisplayName = $_POST["DisplayName"];
$AccessID = $_POST["AccessID"];

if ($Password==$Passwordcheck)
{
$sql = "INSERT INTO users (UserID, Username, Password, Email, DisplayName, AccessID) VALUES ('". $UserID ."', '" .$Username."', '".$Password."', '".$Email."', '".$DisplayName."', '".$AccessID."')";
if (mysqli_query($db, $sql)) {
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
session_start();
$_SESSION['Username'] = $Username;
header("location:index.php");
$sql = "INSERT INTO users (UserID, Username, Password, Email, DisplayName, AccessID) VALUES ('". $UserID ."', '" .$Username."', '".$Password."', '".$Email."', '".$DisplayName."', '".$AccessID."')";
}
else
{
echo "Passwords do not match";
}
?>