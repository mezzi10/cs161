<?php
        //connect to database
        require_once'connect_database.php';


        $fName = $lName = $username = $password = $email = "";


        $UnRequired = $PwRequired = $EmRequired = $FnRequired = $LnRequired = "";

//$conn = new mysqli("localhost", "messi55", "messi", "cs161");
        if ($conn->connect_error) {
            echo 'jjj';
        }
        $query = "SELECT * FROM users";



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['username']) || empty($_POST['password'])) {

                if (empty($_POST['username'])) {

                    $UnRequired = "Required*";
                } else {

                    $username = mysql_fix_string($conn, $username);
                }
                if (empty($password = $_POST['password'])) {

                    $PwRequired = "Required*";
                } else {
                    $password = mysql_fix_string($conn, $password);
                }
            } else {

                //get the value of username after sanitizing input and convert it to lower case
                $username = strtolower(mysql_fix_string($conn, $_POST['username']));
                //get the value of password, convert it to lower case and hash it
                $password = sha1(strtolower(mysql_fix_string($conn, $_POST['password'])));


                //check if username exists
                $recExists = "SELECT * FROM user WHERE userName='$username'";
                $result = mysqli_fetch_array($conn->query($recExists));

                //if username exists...print error
                if ($result != false) {
                    $UnRequired = "userName exists*";

                    //otherwise...insert a new record with the new username and password   
                } else {
                    //create a directory for the new user
                    mkdir($username);
                    $stm = ("INSERT INTO user(userName,passWord) VALUES('$username','$password')");
                    //if record was inserted successfully...forward user to log in page
                    if ($conn->query($stm) === true) {

                        header("location:index.php");
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            }
        }

//sanitize user input
        function mysql_fix_string($conn, $string) {
            if (get_magic_quotes_gpc()) {
                $string = stripslashes($string);
                return $conn->real_escape_string($string);
            }
            return $string;
        }
        ?>
