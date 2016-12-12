
<?

include("scripts/footer.php");

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
include ('scripts/dbconnect.php');
$ItemID = str_replace(' ', '-', $_POST["ItemID"]);
$Title = $_POST["Title"];
$Content = $_POST["Content"];
$AccessID = $_SESSION['AccessID'];
    $APhotoID = $_SESSION['PhotoID'];
$sql = "INSERT INTO health (ItemID, Title, Content, AccessID, PhotoID) VALUES ('". $ItemID ."', '" .$Title."', '".$Content."', '".$AccessID."', '" .$PhotoID."')";
if (mysqli_query($db, $sql)) {
} else {
echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);
}
header("news");
}
//test
} else {
header("location:index.php");
}

?>