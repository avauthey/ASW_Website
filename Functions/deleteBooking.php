<?php


include('connectDB.php');
if($_GET['id'])
{
$id=$_GET['id'];
 $sql = "delete from booking_customer where transactionum='$id'";
 mysql_query("delete from customer where id='$id'");
 mysql_query( $sql);
}

?>