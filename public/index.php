<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['name']))
{
	$name=$_GET['name'];
	$rating = get_rating($name);
	
	if(empty($rating))
	{
		response(200,"Product Not Found",NULL);
	}
	else
	{
		response(200,"Product Found",$rating);
	}	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}

?>
<?php

function get_rating($name)
{
	$titles = [
		"got"=>7,
		"breakingbad"=>8,
		"truedetective"=>7,
		"sherlockholmes"=>9,
		"strangerthings"=>6,
		"narcos"=> 8

	];
	
	foreach($titles as $title=>$rating)
	{
		if($title==$name)
		{
			return $rating;
			break;
		}
	}
}

?>
