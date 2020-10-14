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
		$result=pg_query("Select Count(*)
							From message2
							Where receiver_id=$u");
		$arr=pg_fetch_array($result);
		echo "<h3>Total Messages: ",$arr['count'],"</h3>";
		$result=pg_query("Select (Select profile_name From profile Where userid=sender_id),date,time,message_body,sender_id
							From message2
							Where receiver_id=$u
							Order by date Desc,time Desc");
		$arr=pg_fetch_all($result);
		echo "<h2><b><i>Messages: </i></b></h2>";
		//if($arr && pg_num_rows($arr)>0)
        foreach($arr as $array)
		{
			echo  '<p style="font-size:160%;" style="color:red;">',$array['profile_name'],"</p>";
			$val=$array['sender_id'];
			//echo gettype($val);
			echo "<a href='seeprofile2.php?uidx=$val'> see profile </a><br>";
			echo $array['message_body'],"<br>";
			echo "Date:   ",$array['date'];
			echo "    Time:   ",$array['time'],"<br>";
		
		
		
		}
		//else echo"<h4>No inbox message</h4>";
		?>
		</body>
		</html>
        