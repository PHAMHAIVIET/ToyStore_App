<?php

$sname= "localhost";
$unmae= "
id20940878_haiviet128";
$password = "1282003aA!";

$db_name = "id20940878_dblogin";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
