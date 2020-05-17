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
