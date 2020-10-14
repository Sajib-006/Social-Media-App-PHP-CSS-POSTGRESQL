<!DOCTYPE html>
<html>
<head>
	<title> Write post </title>
	 <link rel = "stylesheet" type="text/css" href="Form2.css">
</head>
<body>
	<?php
	
	include_once 'connectiondemo.php';
	include("header.php");
		
		echo $_SESSION['usid'], "<br>";
		$u=intval($_SESSION['usid']);
		
		
	$res = pg_query("select * from profile where userid=$u");
	$arr = pg_fetch_array($res, NULL, PGSQL_ASSOC);
	echo "<h4><b>Profile Name:   </b>".$arr['profile_name']."</h4><br>";
	echo "<h4><b>Occupation:   </b>".$arr['occupation']."</h4><br>";
	echo "<h4><b>Works at:   </b>".$arr['workplace']."</h4><br>";
	echo "<h4><b>Gender:   </b>".$arr['gender']."</h4><br>";
	echo "<h4><b>Birth date:   </b>".$arr['birthdate']."</h4><br>";
	$val2=pg_query("Select  get_userage($u)");
	$val3=pg_fetch_array($val2);
	echo "<h4><b>Age:   </b>".$val3[0]."</h4><br>";
	?>
	
	
	
</body>
</html>
