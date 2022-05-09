<?php
include_once("../includes/_connect.php");
$id = $_POST["id"];
$sql = "DELETE FROM `tblUsers` WHERE `ID` = $id";
$run = mysqli_query($db_connect, $sql);
$sql = "SELECT * FROM `tblUsers` WHERE `ID` = $id";
$run = mysqli_query($db_connect, $sql);
$rows = mysqli_num_rows($run);

if($rows == 0){
    echo json_encode(array("statusCode"=> 200));
}
else{
    echo json_encode(array("statusCode"=> 201));
}
die("");
?>
