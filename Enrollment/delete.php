<?php
include "db.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM student_tb WHERE id=$id");
header("Location: admin.php");
exit;
?>