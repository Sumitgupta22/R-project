<?php
$sname = "localhost";

$uname = "root";

$password = "";

//$database = "RECORDS-STORAGE";
$database = "testrecor";



$con = mysqli_connect($sname, $uname, $password, $database);

if (!$con) {
    echo "<script>alert('Not Server Connection');</script>";

} else {

}
?>