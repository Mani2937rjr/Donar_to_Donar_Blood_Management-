<?php 

$con=new mysqli("localhost","root","","mini");
if($con->connect_error)
{
	echo "Database Connection Failed";
}

?>