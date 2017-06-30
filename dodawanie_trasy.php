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
<title>Dodawanie Trasy</title>
</head>
<body>

<div id='fg_membersite'>

<h2>Dodawanie trasy</h2>
<form id='login' action="insert.php" method="post">

<input  type='hidden' name='submitted' id='submitted' value='1'/>
	<p >
    	<label for="start">Start:</label>
        <br>
        <input type="text" name="start" id="start">
    </p>
	<p style="position:relative;">
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
	<p >
    	<label for="startdata">Data:</label>
        <br>
        <input type="date" name="startdata" id="startdata">
    </p>
	<p >
    	<label for="startczas">Godzina wyjazdu:</label>
        <br>
        <input type="time" name="startczas" id="startczas">
    </p >
<p >
    	<label for="miejsca">Ilosc miejsc:</label>
        <br>
        <select name="miejsca" id="miejsca">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
    </p >
    <input type="submit" value="Dodaj Trase">
<br>
<br>
<a href='login-home.php'>Wstecz</a>
</form>
</center>
</body>
</html>