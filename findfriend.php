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
		/*$result=pg_query("Select userid
							From profile
							Where userid NOT IN(
							select receiver_id
							from friend
							where sender_id=1 AND accept_decline=1
							UNION
							select sender_id
							from friend
							where receiver_id=1 AND accept_decline=1) AND workplace=
							(Select workplace
							From profile
							Where userid=$u)
                            AND userid<>$u");
		$arr=pg_fetch_all($result);
		foreach($arr as $array)
		{
			echo  "<h4>",$array['userid'],"</h4>";
		}
		/*echo "<h3>Total Friends: ",$arr['count'],"</h3>";
		$result=pg_query("Select profile_name,userid
							From profile
							Where userid IN(
							select receiver_id
							from friend
							where sender_id=1 AND accept_decline=1
							UNION
							select sender_id
							from friend
							where receiver_id=1 AND accept_decline=1)");
		$arr=pg_fetch_all($result);
		echo "<h2><b><i>Friend List: </i></b></h2>";
        foreach($arr as $array)
		{
			echo  "<h4>",$array['profile_name'],"</h4>";
			echo $val=$array['userid'];
			echo gettype($val);
		echo "<a href='seeprofile2.php?uidx=$val'> see profile </a><br>";
		
		
		}*/
		$sql=pg_query("Select * From get_mutualfriends($u)");
        $res=pg_fetch_all($sql);
        foreach($res as $array)
		{
			$token = strtok($array['get_mutualfriends'], ".");
			echo "$token<br>";
		    $token = strtok(".");
			$t = intval($token);
			echo "<a href='seeprofile2.php?uidx=$t'> see profile </a><br>";
	        
			
		}

		?>
		</body>
		</html>
        