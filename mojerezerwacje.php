<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Moje Rezerwacje</title>
</head>
<body>
<center>
<h2>Moje Rezerwacje</h2>
<br><br>
<a href='pasazer.php'>Jako pasazer</a>
<br><br>
<a href='kierowca.php'>Jako kierowca</a>
<br><br>
<a href='login-home.php'>Wstecz</a>
</center>
</body>
</html>