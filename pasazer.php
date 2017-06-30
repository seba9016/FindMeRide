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

$userid = $fgmembersite->UserId();

$sql = "SELECT r.ID, start , koniec, postoje, startdata, startczas FROM Trasy t join Rezerwacje r on r.TrasaID = t.ID where r.RUserID = $userid ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " ID Rezerwacji: " . $row["ID"]. " -- Start trasy: " . $row["start"]. " -- Konie trasy: " . $row["koniec"]. " -- Postoje: " . $row["postoje"]. " -- Data: " . $row["startdata"]. " -- Godzina: " . $row["startczas"]. "<br>";
    }
} else {
    echo "Brak rezerwacji jako pasazer";
}


?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Dodawanie Trasy</title>
</head>
<body>
<form id='anulujr' action="anulujr.php" method="post">
<input type='hidden' name='submitted' id='submitted' value='1'/>
	<p>
    	<label for="ID Trasy">Wybierz ID trasy:</label>

<?
echo '<select name="IDR" id ="IDR">';
$sql = "SELECT ID FROM Rezerwacje where RUserID = $userid";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
 echo '<option value="'.$row["ID"].'">'.$row["ID"].'</option>';
}

echo '</select>';
echo '<input type="submit" value="Anuluj Rezerwacje">';
?>
<br><br>
<a href='kierowca.php'>Jako kierowca</a>
<br><br>
<a href='login-home.php'>Wstecz</a>
</body>
</html>