<?php

include "../admin/lib/connection.php";
//update data from modal //
if(isset($_GET['id']))
{ 

$d_id=$_GET['id'];


		
$query_delete=" DELETE FROM tbl_category WHERE id='$d_id' ";
$query_run=$conn->query($query_delete);
if ($query_run){
	echo "<script> alert('data update'); </script>";
	header('Location:category.php');
}
else{
	echo "<script> alert('data notupdate'); </script>";
	header('Location:category.php');

}

}

?>