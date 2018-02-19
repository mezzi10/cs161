<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <input name="file" type="file"/>
        <button type="submit">submit</button>
        </form>
        
        
        <?php
        
        if(!empty($_FILES['file'])){
            
        switch ($_FILES['file']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:                   
             header("location:".$_SERVER['HTTP_REFERER']);
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
        }
        $target_file = basename($_FILES["file"]["name"]);
        // SplFileObject::next(void);
        
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {

         
            $myfile = fopen($target_file, "r");
            $file = new SplFileObject($target_file);
        
        while (!$file->eof()) { 
            
            //$content= fgets($myfile);
            $content = trim($file->current());
            $pattern = "/skills/i";
            $pattern2 = "/experience/i";
            $end ="me";
            
            //echo $file->current();
            if(preg_match($pattern, $content, $matches)){ 
                 
                do{
                 
                 // echo $file->current(); 
                  $content = trim($file->current());
                 echo trim($file->current()); 
                 echo '<br>';                 
                 $file->next();
                }while((!preg_match($pattern2, $content, $matche)));
                
            }
             $file->next();
            
        }
        }
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        /*
        function getHTML($url,$timeout)
{
       $ch = curl_init($url); // initialize curl with given url
       curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
       curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
       return @curl_exec($ch);
}*/
        /*
$html=getHTML("http://www.messichaib.com",10);
preg_match("/\<title\>(.*)\<\/title\>/i", $html, $match);
$title = $match[0];
echo $title;

//use curl to get html content
function getHTML($url,$timeout)
{
       $ch = curl_init($url); // initialize curl with given url
       curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
       curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
       
       return @curl_exec($ch);
}
$html=getHTML("http://www.messichaib.com",10);
// Find all images on webpage
if($html && is_object($html) && isset($html->nodes)){
        foreach ($html->find("img") as $element) {
            echo $element->src . '<br>';
        }
}

//// Find all links on webpage
//if($html && is_object($html) && isset($html->nodes)){
//        foreach ($html->find("a") as $element) {
//            echo $element->href . '<br>';
//        }
//}
//$html = file_get_contents($html);
//
//libxml_use_internal_errors( true);
//$doc = new DOMDocument;
//$doc->loadHTML("http://www.messichaib.com");
//$xpath = new DOMXpath($doc);
//
//// A name attribute on a <div>???
//$node = $xpath->query( '//div[@name="messi"]')->item( 0);
//
//echo $node->textContent; // This will print **GET THIS TEXT**
         
         */
        ?>
    </body>
</html>
