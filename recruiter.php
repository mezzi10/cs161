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

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input name="file" type="file"/>
            <button type="submit">submit</button>
        </form>


        <?php
       
        $percentage = 0;
        if (!empty($_FILES['file'])) {

            switch ($_FILES['file']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    header("location:" . $_SERVER['HTTP_REFERER']);
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
                $keywords = array('java','c++','php','python','c','angular');
                $have_skill = array();
                function match($keywords, $content) {
                    global $percentage,$have_skill;
                    foreach ($keywords as $keyword) {
                         $pattern = "/$keyword/i";
                        if(preg_match($pattern, $content, $matches)){ 
                         if(!in_array($keyword,$have_skill)){                                        
                                
                               array_push($have_skill,$keyword);                             
                              
                            
                        }
                        }
                    }
                    return false;
                }
                $keywords = $_POST['skills'];
                while (!$file->eof()) {
                
                    $content= fgets($myfile);
                    $content = trim($file->current());
                    match($keywords,$content);
                    
                   
                    $file->next();
                }
                $percentage = sizeof($have_skill) * 100/sizeof($keywords);  
                echo $percentage;                
            }
        }



        ?>
    </body>
</html>
