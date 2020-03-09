<?php

    /*
    ---------------------------------------------------------
	    ____           __                                 
	   /  _/___  _____/ /_____ _____ __________ _____ ___ 
	   / // __ \/ ___/ __/ __ `/ __ `/ ___/ __ `/ __ `__ \
	 _/ // / / (__  ) /_/ /_/ / /_/ / /  / /_/ / / / / / /
	/___/_/ /_/____/\__/\__,_/\__, /_/   \__,_/_/ /_/ /_/ 
	                         /____/                                                         
    ---------------------------------------------------------
    */     


	// use this instagram access token generator http://instagram.pixelunion.net/
	$access_token="YOUR-ACCESS-TOKEN-HERE";
	$photo_count=9;
	     
	$json_link="https://api.instagram.com/v1/users/self/media/recent/?";
	$json_link.="access_token={$access_token}&count={$photo_count}";


	$json = file_get_contents($json_link);
	$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

	// Use the following code instead if you’re using PHP version older than 5.4 
	// $json = file_get_contents($json_link);
	// $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);


	if($obj['data']):

		echo '<ul>';
		foreach ($obj['data'] as $post) {
		    
		   $pic_text				= $post['caption']['text'];
		   $pic_link				= $post['link'];
		   $pic_like_count		= $post['likes']['count'];
		   $pic_comment_count	= $post['comments']['count'];
		   $pic_src					= str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
		   $pic_created_time		= date("F j, Y", $post['caption']['created_time']);
		   $pic_created_time		= date("F j, Y", strtotime($pic_created_time . " +1 days"));
		     
		   
		   echo '<li>';
			echo '<a href="'.$pic_link.'" target="_blank">';
			echo '<img src="'.$pic_src.'" alt="'.$pic_text.'">';
			echo '<a href="'.$pic_link.'" target="_blank">'.$pic_created_time.'</a>';
			echo '<p>'.$pic_text.'</p>';
			echo '</a>';
			echo '</li>';
		}
		echo '</ul>';

	endif;



?>
