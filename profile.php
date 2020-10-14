

<?php
	include_once 'connectiondemo.php';
	include("header.php");
	//session_start();
	echo $_SESSION['usid'],"<br>";
	echo $x= intval($_SESSION['usid']),"<br>";
	echo gettype($_SESSION['usid']),"<br>";
	echo gettype($x),"<br>";
	
	$pname=$_POST['email'];
	$gender=$_POST['gender'];
	$occ=$_POST['occ'];
	$wp=$_POST['wp'];
	$bd=$_POST['bd'];
	//$x=intval($_SESSION['usid']);
	
	
	
	if(isset($_POST['log'])){
		
		echo "hi<br>";
		
		$row=pg_query("
						update profile
						Set profile_name = '$pname',
							gender= '$gender',
							occupation = '$occ',
							workplace = '$wp',
							birthdate = to_date('$bd','DD/MM/YYYY')
						where userid= $x");
					
		
		echo "affects", "<br>" ,pg_num_rows($row), "<br>" , pg_affected_rows($row);
		
			echo"<h4> Successfully updated!</h4>";
			
		
	}	
	
	
?>