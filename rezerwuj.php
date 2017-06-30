<?php

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

$IDT = mysqli_real_escape_string($conn, $_REQUEST['IDT']);
$userid = $fgmembersite->UserId();

$sql = "Insert into Rezerwacje (TrasaID, RUserID, Rodzaj) values ($IDT,$userid,'Zarezerwowana' ) ";
$sql2 = "update Trasy set Rodzaj = 'Zarezerwowana', miejsca = miejsca - 1 where ID = $IDT ";

if(mysqli_query($conn, $sql)){
    echo "Trasa zarezerwowana pomyslnie.";
} else{
    echo "ERROR: Problem z polaczeniem. " . mysqli_error($conn);
}


if(mysqli_query($conn, $sql2)){
    echo "Trasa zarezerwowana pomyslnie.";
} else{
    echo "ERROR: Problem z polaczeniem. " . mysqli_error($conn);
}

mysqli_close($conn);
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