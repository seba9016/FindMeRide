<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Find Me Ride</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
<body>
<center>
<div id='fg_membersite_content'>
<h2>Find Me Ride</h2>
Witaj <?= $fgmembersite->UserFullName(); ?>!
<p><a href='dodawanie_trasy.php'>Dodaj Trase</a></p>
<p><a href='wyszukiwanie_trasy.php'>Wyszukaj Trase</a></p>
<p><a href='mojetrasy.php'>Moje Trasy</a></p>
<p><a href='mojerezerwacje.php'>Moje rezerwacje</a></p>
<p><a href='change-pwd.php'>Zmien Haslo</a></p>


<br><br><br>
<p><a href='logout.php'>Wyloguj</a></p>

</div>
</center>
</body>
</html>
