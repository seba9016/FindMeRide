<?php

require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("192.168.101.146", "euromat0_admin", "admin123!", "euromat0_FindMeRide");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
$koniec = mysqli_real_escape_string($link, $_REQUEST['koniec']);
$postoje = mysqli_real_escape_string($link, $_REQUEST['postoje']);
$startdata = mysqli_real_escape_string($link, $_REQUEST['startdata']);
$startczas = mysqli_real_escape_string($link, $_REQUEST['startczas']);
$miejsca = mysqli_real_escape_string($link, $_REQUEST['miejsca']);
$userid = $fgmembersite->UserId();

 //attempt insert query execution
$sql = "INSERT INTO Trasy (UserID, Start, Koniec, Postoje, Rodzaj, StartData , StartCzas, miejsca) VALUES ($userid, '$start', '$koniec', '$postoje', 'Aktywna', '$startdata', '$startczas',$miejsca )";
if(mysqli_query($link, $sql)){
    echo "Trasa dodana pomyslnie.";
} else{
    echo "ERROR: Problem z polaczeniem. " . mysqli_error($link);
}

// close connection
mysqli_close($link); 

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
