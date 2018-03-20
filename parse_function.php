<?php

// website we want to take the content from
include('simple_html_dom.php');

$html = file_get_html('https://google.co.in/');
$count=0;

// search for keywords from the website we choose
$searchfor1 =array("PHP","MySql","HTML","CSS","Javascript","C++","Java","C","Python");
$contents=file_get_html('https://www.indeed.co.in/jobs?q=web%20developer&l=Bengaluru%2C%20Karnataka&vjk=c832f5eaa2bf8ee5/')->plaintext;
$size= str_word_count($contents);

echo " ";

// search for function
foreach($searchfor1 as $searchfor) 
{
  $contents=file_get_html('https://www.indeed.co.in/jobs?q=web%20developer&l=Bengaluru%2C%20Karnataka&vjk=c832f5eaa2bf8ee5/')->plaintext;
  $pattern = preg_quote($searchfor, '/');
  $count= substr_count($contents,$pattern);
  $per=($count/$size)*100;

  echo "This Job is well suited for ".$searchfor;
  echo " ";
  echo $per*100;
  echo "%";
  echo "<br>";
  echo " ";
}

?>
