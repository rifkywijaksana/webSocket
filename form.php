<?php
	include ("codebase/connector/form_connector.php");
	include ("codebase/connector/db_pdo.php");

	$dbtype = "mysql";								// mysql or pgsql
	$dbhost = "127.0.0.1";							// database server
	$dbname = "log_ecu";							// database name
	$dbuser = "root";								// database user
	$dbpassword = "";					// database password 
	$dbcharset = "utf8";								// database charset
	
	$dsn = "mysql:host=$dbhost;dbname=$dbname;charset=$dbcharset";	

	$dbconn = new PDO($dsn, $dbuser, $dbpassword);	

	$data = new FormConnector($dbconn, "PDO");

	function doOnDBError($action, $ex) {
		$error_message = $ex->getMessage();		
		$action->set_response_text($error_message);

	}

	$data->event->attach("OnDBError", doOnDBError);
	$data->render_table("tb_sensor", "id_sensor", "temperatur,rpm,pengapian,tps,02_sensor,volt_battere,kd_kesalahan");

?>