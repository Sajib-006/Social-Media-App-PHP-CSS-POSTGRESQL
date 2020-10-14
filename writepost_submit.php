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
	
	$x=intval($_SESSION['usid']);

	
	
	if(isset($_POST['submit_post'])){
		
		echo "hi<br>";
		$dt=pg_query("select current_date");
		$tm=pg_query("SELECT CURRENT_TIME");
		$d=pg_fetch_row($dt);
		$t=pg_fetch_row($tm);
		echo $d[0];
		echo $m[0];
		$row=pg_query("
						insert into post2(p_id,userid,post_body,date,time) 
						values (default,$x,'$status','$d[0]','$t[0]')"
					  );

					
		
		echo "affects", "<br>" ,pg_num_rows($row), "<br>" , pg_affected_rows($row);
		echo "<h3> Post submitted!!</h3>";
	}	
	
	
?>
</body>

</html>
