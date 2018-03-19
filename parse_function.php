<?php

// $url = 'http:// url of the page we want the content from';

// using file_get_contents function we get the specific content from the page
$content = file_get_contents($url);
echo $content;
// #output# "write the content we want from the webpage"

// using file function 
// read line by line in array
$content = file($url);
print_r($content);

// #output# Array (0] => ﻿"write the content we want from the webpage")

// using cURL
$ch = curl_init($url);  
curl_setopt($ch, CURLOPT_HEADER, 0);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
$content = curl_exec($ch);
echo $content;
//#output# "write the content we want from the webpage"

?>
