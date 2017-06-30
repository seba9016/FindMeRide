<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<center>
<meta charset="UTF-8">
<title>Wyszukiwanie Trasy</title>
</head>
<body>

<div id='fg_membersite'>

<h2>Wyszukiwanie trasy</h2>
<form id='login' action="wyszukaj.php" method="post">

<input  type='hidden' name='submitted' id='submitted' value='1'/>
	<p >
    	<label for="start">Start:</label>
        <br>
        <input type="text" name="start" id="start">
    </p>
    <p >
        <label for="koniec">Koniec:</label>
        <br>
        <input type="text" name="koniec" id="koniec">
    </p>
        <p >
    	<label for="postoje">Postoje:</label>
        <br>
        <input type="radio" name="postoje" value="Tak"> Tak<br>  
        <input type="radio" name="postoje" value="Nie"> Nie<br>
    </p>
    <br>
    <br>
    <input type="submit" value="Szukaj">
<br>
<br>
<a href='login-home.php'>Wstecz</a>
</form>
</center>
</body>
</html>