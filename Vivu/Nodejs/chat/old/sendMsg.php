<?php
/* ###########################################################
 * File brought to you by kkz
 * There are big ships
 * There are small ships
 * but the best ship
 * is friendship!
 * Sharing is caring... please pass this along but leave this
  ##############################################################*/
$userId      =$_REQUEST["userId"];

$randomUserId=$_REQUEST["strangerId"];
$msg         =$_REQUEST["msg"];

include('config.inc.php');
include('ConDatabase.php');

$lsql="INSERT INTO msgs(userId,randomUserId,msg) VALUES($userId, $randomUserId, '$msg'); ";
mysqli_query($con,$lsql);

mysqli_close($con);
?>