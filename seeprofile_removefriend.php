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
		
		echo $_REQUEST['uidx'], "<br>";
		echo $u=intval($_REQUEST['uidx']);
		$a=intval($_SESSION['usid']);
		$r=pg_query("DELETE FROM friend where ((sender_id=$a AND receiver_id=$u)OR (sender_id=$u AND receiver_id=$a))");
		
		
		
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
	
	
	/*
	<form class="" action="seeprofile_addfriend.php?uidx=$u" method="post">
		<div class="container">
			<button type="submit" claas="btn" name="log"> Add Friend </button>
		</div>
	</form>*/
	echo"<form class='' action='seeprofile_addfriend.php?uidx=$u' method='post'>
		<div class='container'>
			<button type='submit' claas='btn' name='log'> Add Friend </button>
		</div>";
	?>
	
	
	
	
	
</body>
</html>
