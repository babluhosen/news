
<?php
session_start();

if(isset($_SESSION['auth']) || isset($_COOKIE['cookiesauth']))
{
	session_destroy();
	if(isset($_COOKIE['cookiesauth']))
	{
		setcookie('cookiesauth', 'true', time()-3600,'/');
	}
	header("location:loginfrom.php");
	
}else
{
header("location:loginfrom.php");
}

 ?>