<?php
	$login = $_REQUEST["login"];
	require("../config/db_config.php");
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	$query = "SELECT login FROM users WHERE login='$login'";
	$result = $conn->query($query);
	$N = $result->num_rows;
	
	if ($N == 0) {
		echo "свободен";
	} else {
		echo "занят";
	}
?>