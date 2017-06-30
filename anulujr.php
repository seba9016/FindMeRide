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

$IDR = mysqli_real_escape_string($conn, $_REQUEST['IDR']);

$sql = " select TrasaID from Rezerwacje where ID = $IDR";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $TrasaID = $row["TrasaID"];



    }
} else {
    echo "0 results";
}
$sql1 = "update Trasy set miejsca = miejsca + 1 where ID = $TrasaID";

if(mysqli_query($conn, $sql1)){
    echo "Miejsce zwolnione pomyslnie.";
} else{
    echo "ERROR: Problem z polaczeniem. " . mysqli_error($conn);
}

$sql2 = " delete from Rezerwacje where ID = $IDR";

if(mysqli_query($conn, $sql2)){
    echo "Rezerwacja anulowana pomyslnie.";
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
<a href='login-home.php'>Wstecz</a>
</body>
</html>