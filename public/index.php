<?php
header("Content-Type:application");
require "data.php";

if(!empty($_GET['name']))
{
	$name=$_GET['name'];
	$rating = get_rating($name);
	
	if(empty($rating))
	{
		response(NULL);
	}
	else
	{
		response($rating);
	}	
}
else
{
	response(NULL);
}

function response($data)
{
	header("HTTP/1.1 ");
	
	echo $data;
}

?>
