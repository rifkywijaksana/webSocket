<?php
	include ("codebase/connector/grid_connector.php");
	include ("codebase/connector/db_pdo.php");

	$dbtype = "mysql";								// mysql or pgsql
	$dbhost = "127.0.0.1";							// database server
	$dbname = "test";							// database name
	$dbuser = "root";								// database user
	$dbpassword = "";					// database password 
	$dbcharset = "utf8";								// database charset
	
	$dsn = "mysql:host=$dbhost;dbname=$dbname;charset=$dbcharset";	

	$dbconn = new PDO($dsn, $dbuser, $dbpassword);	

	$grid = new GridConnector($dbconn, "PDO");
	
	$sql = "SELECT id,nama,alamat FROM alamat";

	$grid->render_sql($sql, "id", "nama,alamat");


?>