<?php


    /*
    -------------------------------------------
        ______                __                __  
       / ____/___ _________  / /_  ____  ____  / /__
      / /_  / __ `/ ___/ _ \/ __ \/ __ \/ __ \/ //_/
     / __/ / /_/ / /__/  __/ /_/ / /_/ / /_/ / ,<   
    /_/    \__,_/\___/\___/_.___/\____/\____/_/|_|  

    -------------------------------------------
    */                                           


    // Create a facebook app at developers.facebook.com and get an appID and an appSecret

    // Pass Page ID
    $page_ID = 'rumourmill616';
    
    $appid = 'APP_ID';
    $appsecret ='APP_SECRET';
    
    $access_token = $appid.'|'.$appsecret;


    // Num Posts
    $number_of_posts = '10';

    $fbpage = file_get_contents('https://graph.facebook.com/v2.7/'.$page_ID.'?fields=posts.limit('.$number_of_posts.'){full_picture,message,created_time,permalink_url}&access_token='.$access_token);
    $fbdata = json_decode($fbpage);

    // Loopy!
    foreach ($fbdata->posts->data as $fbpost) {

        $post_created = date('j M - Y', strtotime($fbpost->created_time));
        $post_text = $fbpost->message;
        $post_url = $fbpost->permalink_url;
        $post_picture = $fbpost->full_picture;

        echo 'Date: '.$post_created;
        echo 'Text: '.$post_text;
        echo 'URL ' . $post_url; 
        echo 'Picture: <img src="'.$post_picture.'">';
    }

?>