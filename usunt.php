<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
$conn = mysqli_connect("192.168.101.146", "euromat0_admin", "admin123!", "euromat0_FindMeRide");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$IDRK = mysqli_real_escape_string($conn, $_REQUEST['IDRK']);

$sql1 = "Delete from Trasy where ID = $IDRK";

if(mysqli_query($conn, $sql1)){
    echo "Trasa usunieta pomyslnie.";
} else{
    echo "ERROR: Problem z polaczeniem. " . mysqli_error($conn);
}

$sql2 = " delete from Rezerwacje where TrasaID = $IDRK";

if(mysqli_query($conn, $sql2)){
    echo "Powiazane rezerwacje usuniete pomyslnie.";
} else{
    echo "ERROR: Problem z polaczeniem. " . mysqli_error($conn);
}




?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Dodawanie Trasy</title>
</head>
<body>
<br><br>
<a href='mojerezerwacje.php'>Wstecz</a>
</body>
</html>