<?php
// Get all the html on a page
$url = "https://epic.avature.net/Careers/FolderDetail/Verona-Wisconsin-United-States-Software-Developer/740";



$html = file_get_contents($url);
//$url = "https://www.facebook.com/careers/jobs/a0I1H00000LBdKwUAL/";
//$html = file_get_contents( $url );

//Using this with the function str_word_count with the 2nd parameter of 1 we can get an array of all the words on the entire page. Later we will need to work out the percentage of a word on the page so we need to get the total words on the page to use later.

// Get an array of all the words in a web page
$allWordsArray = str_word_count( strip_tags($html), 1);
$totalAllWordsArray = count($allWordsArray);

//Using the array_count_values function it will work through all the words we found on the page and get a count of each one, returning an array of the results in a key value pair of the word and the count.

//As we will only want the top 20 words we need to sort the wordCount array highest to lowest by using the arsort function.

//After the array has been sorted we can then grab the first 20 by using array_splice.

// Get the amount of times a word appears on the page
$wordCount = array_count_values($allWordsArray);
arsort($wordCount);

// Get the top 20 words
//$wordCount = array_splice($wordCount, 0,2000);

//Once we have the top 20 words we need to work out the percentage this word appears on the document by dividing the word count by the total number of words and multiple by 100.

// Loop through all the word count array and work out the percentage of a word appearing on the page
$percentageCount = [];
foreach($wordCount as $words => $val)
{
    $percentageCount[$words] = number_format(($val / $totalAllWordsArray) * 100, 2);
}

//return $percentageCount;
 

//++++++++++++++++++++++++++++++++++++++
function getKeywordFrequency( $url )
    {
        // Get all the html on a page
        $html = file_get_contents( $url );

        // Get an array of all the words
        $allWordsArray = str_word_count( strip_tags($html), 1);
        $totalAllWordsArray = count($allWordsArray);

        // Get the amount of times a word appears on the page
        $wordCount = array_count_values($allWordsArray);
        arsort($wordCount);

        // Get the top 20 words
        //$wordCount = array_splice($wordCount, 0,20000);

        // Loop through all the word count array and work out the percentage of a word appearing on the page
        $percentageCount = [];
        $content=implode(" ",$allWordsArray)."<br>";
        $patt="/software/";
        if(preg_match($patt,$content,$res)){
            echo '99999999999999999999999999999999999999999';
        }
        
        foreach($wordCount as $words => $val)
        {
            //echo $words ." ". $val;
            if(strcasecmp($words,"software") == 0){
               echo implode(" ",$allWordsArray)."<br>";
            }
            $percentageCount[$words] = number_format(($val / $totalAllWordsArray) * 100, 2);
           // echo "<br>".$percentageCount[$words] ;
        }

        return $percentageCount;
    }
   
getKeywordFrequency($url );

?>
