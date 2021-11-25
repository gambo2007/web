<?php
require "connection.php";
$id = $_GET["id"];
$sql = "DELETE FROM class WHERE id=$id";
if ($conn->query($sql) === TRUE) {
	header("Location: list.php");
}
?>