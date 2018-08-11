<?php
// ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "235083739-FEriS14WtEnow5NDn4Zxjul9HOeJU0xvQHY08kRr",
    'oauth_access_token_secret' => "i49ZKxeHkGJYEr9IFrDC1ratrQaAEy37AcVeS74VpdWfu",
    'consumer_key' => "HcirfrKMWgZC98dbcdmL2t5wy",
    'consumer_secret' => "hEOghGmEZ3V9pfwBscKMeUh1CBoNsrkHNVjMFveginjHiRSU1F"
);


$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = 'user_id=M2Lasers';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$feeds_data = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

$feeds_data_array = json_decode($feeds_data, true);

// echo "<pre>";

// print_r($feeds_data_array);

// , 'url' => $feeds_data_array[$i]['entities']['urls'][0]['url'] 

$array_return = array();
for ($i=0; $i < 3 ; $i++) { 

    $date_created =date_create($feeds_data_array[$i]['created_at']);
    $date_created_at = date_format($date_created,"M d");

    
    array_push($array_return, array('id'=>$feeds_data_array[$i]['id_str'], 'created_at' => $date_created_at, 'text'=> $feeds_data_array[$i]['text'], 'name'=> $feeds_data_array[$i]['user']['name'], 'screen_name' => $feeds_data_array[$i]['user']['screen_name']));


}


// print_r($array_return);

echo json_encode($array_return);