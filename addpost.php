<?
include('dbconnect.php');
$Title = $_POST["Title"];
$Content = $_POST["Content"];
$AccessID = $_Post["AccessID"];
$PhotoID = $_Post["PhotoID"];


$sql = "INSERT INTO health  (ItemID, Content, AccessID, PhotoID)
 VALUES ('$Title ', '$Content', '$AccessID', '$PhotoID')";
$result = $db->query($sql);
header('Location: addingnewscontent.php');


?>

