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
        $java = 0;
        $c = 0;
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
                         if(!in_array($keyword,$have_skill)){  
                        if (strpos($content, $keyword) !== false ){                  
                                
                               array_push($have_skill,$keyword);
                                
                               $percentage++; 
                            }
                        }
                    }
                    return false;
                }
                $i =0;
                while (!$file->eof()) {
                
                    $content= fgets($myfile);
                    $content = trim($file->current());
                    match($keywords,$content);
                    
                    $i++;
                    $file->next();
                }
                echo $percentage;                
            }
        }



        ?>
    </body>
</html>
