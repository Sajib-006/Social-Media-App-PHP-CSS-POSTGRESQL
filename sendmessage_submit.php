<html>
<head>
	<title> post confirmation </title>
	 <link rel = "stylesheet" type="text/css" href="Form2.css">
</head>
<body>

<?php
	include_once 'connectiondemo.php';
	include("header.php");
	
	echo $_SESSION['usid'],"<br>";
	echo $x= intval($_SESSION['usid']),"<br>";
	echo gettype($_SESSION['usid']),"<br>";
	echo gettype($x),"<br>";
	
	$status=$_POST['status'];
	$receiver=$_POST['receiver'];
	$result=pg_query("Select userid From signin Where username='$receiver' ");
	$res=pg_fetch_array($result);
	$u=intval($res['userid']);
	
	$x=intval($_SESSION['usid']);
	
	
	if(isset($_POST['submit_message'])){
		
		//echo "hi<br>";
		$dt=pg_query("select current_date");
		$tm=pg_query("SELECT CURRENT_TIME");
		$d=pg_fetch_row($dt);
		$t=pg_fetch_row($tm);
		//echo $d[0];
		//echo $t[0];
		$row=pg_query("
						insert into message2(sender_id,m_id,receiver_id,message_body,date,time) 
						values ($x,default,$u,'$status','$d[0]','$t[0]')"
					  );

					
		
		echo "affects", "<br>" ,pg_num_rows($row), "<br>" , pg_affected_rows($row);
		echo "<h3> Message Sent!!</h3>";
	}	
	
	
?>
</body>

</html>
