<?php

/*
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");
*/

$spotify_client_id='5510ef73fb5348c8b8dec19039f1dc9d';
$spotify_client_secret='2b9a114862484c86bc8fb75c8406fb52';


$data="grant_type=client_credentials";
$headers = array("Content-Type: application/x-www-form-urlencoded",
"Authorization: Basic " . base64_encode($spotify_client_id . ":" . $spotify_client_secret));
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result1= curl_exec($curl);
curl_close($curl);


$spotify_token = json_decode($result1)->access_token;

// parte 2

$curl = curl_init();
$headers = array("Authorization: Bearer ". $spotify_token);

curl_setopt($curl, CURLOPT_URL,
    "https://api.spotify.com/v1/browse/categories/gaming/playlists");
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result2 = curl_exec($curl);
curl_close($curl);


$playlists_obj = json_decode($result2);

// parte 3 

$num_playlists = count($playlists_obj->playlists->items);
$random_index = rand(0, $num_playlists - 1);
$random_playlist_id = $playlists_obj->playlists->items[$random_index]->id;


$curl=curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_URL,
"https://api.spotify.com/v1/playlists/" . $random_playlist_id . "/tracks");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


$result3 = curl_exec($curl);
curl_close($curl);


echo $result3;






?>