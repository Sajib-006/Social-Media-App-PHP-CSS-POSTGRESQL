<!DOCTYPE HTML>
<html lang="en-US">
<?php 
header("Location: http://localhost:8080/phpProject/newsfeed.php/");

if(isset($_POST['add_like'])){
							$post_id=intval($_REQUEST['pid']);
							$res=pg_query("insert into like_table(like_id,p_id,liker_id,c_id) values(default,$post_id,$u,NULL)");
							 unset($_POST);
							}
							
							//header('Location: /C:/xampp/htdocs/phpProject/to/newsfeed.php');
							?>
    <head>
       <!--<meta http-equiv="refresh" content="0; url=file:///C:/xampp/htdocs/phpProject/newsfeed.php" />-->
        <title>Page Redirection</title>
    </head>
    <body>
        <!-- Note: don't tell people to `click` the link, just tell them that it is a link. -->
        <!--If you are not redirected automatically, follow this <a href='localhost\newsfeed.php'>link to example</a>. -->
    </body>
</html