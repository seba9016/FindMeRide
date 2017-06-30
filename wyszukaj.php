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

$start = mysqli_real_escape_string($conn, $_REQUEST['start']);
$koniec = mysqli_real_escape_string($conn, $_REQUEST['koniec']);
$postoje = mysqli_real_escape_string($conn, $_REQUEST['postoje']);

$sql = "SELECT ID, start , koniec, postoje, startdata, startczas FROM Trasy where (start like '$start' or koniec like '$koniec') and postoje = '$postoje' and miejsca > 0 and startdata > CURDATE()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " ID Trasy: " . $row["ID"]. " -- Start trasy: " . $row["start"]. " -- Konie trasy: " . $row["koniec"]. " -- Postoje: " . $row["postoje"]. " -- Data: " . $row["startdata"]. " -- Godzina: " . $row["startczas"]. "<br>";
    }
} else {
    echo "0 results";
}
//$conn->close();

?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Dodawanie Trasy</title>
</head>
<body>
<form id='rezerwuj' action="rezerwuj.php" method="post">
<input type='hidden' name='submitted' id='submitted' value='1'/>
	<p>
    	<label for="ID Trasy">Wybierz ID trasy:</label>

<?
echo '<select name="IDT" id ="IDT">';
$sql = "SELECT ID FROM Trasy where (start like '$start' or koniec like '$koniec') and postoje = '$postoje' and miejsca > 0  and startdata > CURDATE()";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
 echo '<option value="'.$row["ID"].'">'.$row["ID"].'</option>';
}

echo '</select>';
echo '<input type="submit" value="Zarezerwuj">';
?>



    </p>
    <br>
    <br>
<a href='wyszukiwanie_trasy.php'>Wstecz</a>
</body>
</html>