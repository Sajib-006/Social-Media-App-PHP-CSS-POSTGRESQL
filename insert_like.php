

<!DOCTYPE html>
<html>
<head>
	<title> News feed </title>
	 <link rel = "stylesheet" type="text/css" href="table_design2.css">
</head>
<body>
	<?php
	
		echo $y= intval($_REQUEST['pid']);
		echo $_REQUEST['liked'];
		include("header.php");
		include_once 'connectiondemo.php';
		echo $_SESSION['usid'], "<br>";
		echo $u=intval($_SESSION['usid']);
		echo gettype($u);
		$x=1;
		if( $_REQUEST['liked']=='1' )
		{
			$r=pg_query("select like_unlike from like_table where liker_id=$u AND p_id=$y)");
			$r2=pg_fetch_array($r);
			echo"hi",gettype($r2[0]),$r2[0];
			if($r2[0]==NULL) pg_query("Insert into like_table(like_id,liker_id,p_id,c_id,like_unlike) Values(default,$u,$y,NULL,1)");
			else pg_query("Update like_table set like_unlike=1 where p_id=$y AND liker_id=$u");
							
		}
			//$res2=pg_query("Insert into like_table(like_id,liker_id,p_id,c_id,like_unlike) Values(default,$u,$y,NULL,1)");
		else if($_REQUEST['liked']=='0')
		{
			$r=pg_query("select like_unlike from like_table where liker_id=$u AND p_id=$y)");
			$r2=pg_fetch_array($r);
			echo"hi",gettype($r2[0]),$r2[0];
			if($r2[0]==NULL) $res2=pg_query("Insert into like_table(like_id,liker_id,p_id,c_id,like_unlike) Values(default,$u,$y,NULL,0)");
			else $res2=pg_query("Update like_table set like_unlike=0 where p_id=$y AND liker_id=$u");
		}
			//$res2=pg_query("Insert into like_table(like_id,liker_id,p_id,c_id,like_unlike) Values(default,$u,$y,NULL,0)");
			
		
		//$res2=pg_query("Insert into like(like_id,liker_id,p_id,c_id) Values(default,$u,)");
		$res=pg_query("	select userid,p_id,profile_name,post_body,time,date
						From post2 A inner join profile B using (userid)
						Where A.userid=$u OR A.userid IN(
						select receiver_id
						from friend
						where sender_id=$u AND accept_decline=1
						UNION
						select sender_id
						from friend
						where receiver_id=$u AND accept_decline=1)
						Order by date Desc,time Desc
						");
		
       // $res2=pg_query("Insert into like(like_id,liker_id,p_id,c_id) Values(default,$u,)");
	    $round=pg_query("Select Max(p_id) From post2 ");
			   $round2=pg_fetch_array($round);
               $round3=intval($round2[0]);
			   $round3=$round3+1;
			   for($n = 0; $n < $round3; $n++){ 
                   $like_arr[$n]=0; 
                }
		$resultArr = pg_fetch_all($res);
		$res3=pg_query("Select p_id,like_unlike From like_table");
		$resultArr2 = pg_fetch_all($res3);
		foreach($resultArr2 as $array2)
		{
			echo $index=intval($array2['p_id']);
			echo $bval=intval($array2['like_unlike']);
			echo $like_arr[$index]=$bval;
		}
		//echo pg_affected_rows($resultArr);
		//print_r($resultArr);
		if( pg_num_rows($res)>0) {
			echo '<table>
					<tr>
					 <td><h3>User name</h3></td>
					 <td><h3>Status</h3></td>
					 <td><h3>Date</h3></td>
					 <td><h3>Time</h3></td>
					 <td><h3>Like  </h3></td>
					 <td><h3>Like count</h3></td>
					 <td><h3>View Likes  </h3></td>
					 <td><h3>Comment  </h3></td>
					 <td><h3>View comments</h3></td>
					 
					</tr>';

			foreach($resultArr as $array)
			{
				echo gettype($_REQUEST['liked']);
				echo "<tr>";
				        $post_id=intval($array['p_id']);
						$post_id=intval($array['p_id']);
						echo "<td>". $array['profile_name']."</td>";
						echo "<td>". $array['post_body']."</td>";
						echo "<td>". $array['date']."</td>";
						echo "<td>". $array['time']."</td>";
						echo "<td>";
						
							/*if(gettype($_REQUEST['liked'] )==NULL)
								echo"<a href='newsfeed.php?pid=$post_id&liked=1' class='button'>Like</a>";
							else if($_REQUEST['liked'] && $_REQUEST['liked']=='1' && $post_id==$y)
							   echo"<a href='newsfeed.php?pid=$post_id&liked=0' class='button'>Unlike</a>";
						   else if( $_REQUEST['liked']=='0'&& $post_id==$y)
								echo"<a href='newsfeed.php?pid=$post_id&liked=1' class='button'>Like</a>";
							else echo"<a href='newsfeed.php?pid=$post_id&liked=1' class='button'>Like</a>";*/
							if($like_arr[$post_id]==1) 
								echo"<a href='insert_like.php?pid=$post_id&liked=0' class='button'>Unlike</a>";
							else if($like_arr[$post_id]==0)
								echo"<a href='insert_like.php?pid=$post_id&liked=1' class='button'>Like</a>";
							
						echo "</td>";
												//echo "<td> <a href='view_post_details.php?uidx=$array['userid']&pidx=$array['p_id']'>View Details</a></td>";
				echo "</tr>";
			}
			echo '</table>';
		}
			//else if(!$resultArr) echo"query error";
		else	echo"<h4>No post available.</h4>";	
	?>
	

	
</body>

</html>
