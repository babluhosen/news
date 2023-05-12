<?php

include "../admin/lib/connection.php";
//update data from modal //
if(isset($_GET['id']))
{ 

$d_id=$_GET['id'];


		
$query_delete=" DELETE FROM tble_news WHERE id='$d_id' ";
$query_run=$conn->query($query_delete);
if ($query_run){
	echo "<script> alert('data update'); </script>";
	header('Location:news.php');
}
else{
	echo "<script> alert('data notupdate'); </script>";
	header('Location:news.php');

}

}

?>