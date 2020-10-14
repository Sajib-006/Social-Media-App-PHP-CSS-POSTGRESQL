class DBconnection
{
	var &conn;
	function DBconnection()
	{
	&this-> = pg_connect( "host='localhost' port='5432' dbname='Practise' user='postgres' password='21011998' ")
	or die("unable to connect");
	}
	
	
}