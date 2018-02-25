<?php
//connect to database
        require_once'connect_database.php';

//initialize variables to empty string
        $username = $password = $email = "";
        $UnRequired = $PwRequired = $EmRequired = "";


        if ($conn->connect_error) {
            echo 'jjj';
        }



//if the request is post...do the following
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //check if username or password fields are empty
            if (empty($_POST['username']) || empty($password = $_POST['password'])) {

                //if username field is empty...print error 'required'
                if (empty($_POST['username'])) {
                    $UnRequired = "Required*";

                    //if username field is not empty...get the submitted value
                } else {
                    $username = mysql_fix_string($conn, $_POST['username']);
                }
                //if password field is empty...print error 'required'
                if (empty($password = $_POST['password'])) {
                    $PwRequired = "Required*";

                    //if password field is not empty...get the submitted value
                } else {
                    $password = mysql_fix_string($conn, $_POST['password']);
                }
            } else {




                //if username field is not empty...get the submitted value
                $username = strtolower(mysql_fix_string($conn, $_POST['username']));

                //if password field is not empty...get the submitted value, convert it to lower case and hash it
                $password = sha1(strtolower(mysql_fix_string($conn, $_POST['password'])));

                //get only the 20 charachters the password has in order to match the hash in database
                $password = substr($password, 0, 20);
                //set the username to the session
                $_SESSION["username"] = $username;

                //get the role of the user, it is a hidden input: normal user or admin?
                $_SESSION['user'] = $_POST['role'];

                //check if username exists in database
                $query = "SELECT * FROM user WHERE userName='$username'" or die("query failed");

                //if username exists...check if the password match what's in database
                if (mysqli_query($conn, $query)) {

                    //get the password for the entered username
                    $valPassword = $conn->query("SELECT passWord FROM user WHERE userName = '$username'");


                    if ($valPassword) {
                        echo mysqli_affected_rows($conn);
                    }

                    //check if the password match what's in database
                    if (mysqli_query($conn, $query)) {

                        //get the password for the entered username
                        $row = $conn->query("SELECT passWord FROM user WHERE userName = '$username'");

                        //go through the result set and see if it matches the password for that username
                        while ($row = $valPassword->fetch_assoc()) {

                            //if the password matches what's in database, forward the user to the upload page 
                            if ($row["passWord"] == $password) {

                                //forward user to upolaod page..successfull log in
                                header("location: upload.php?username=" . $username);
                            }
                            //if password does't match, user will be asked to renter useranme and password
                        }
                    }
                } else {
                    echo ": " . mysqli_error($conn);
                }
            }
        }

//sanitize user input
        function mysql_fix_string($conn, $string) {
            if (get_magic_quotes_gpc()) {
                $string = stripslashes($string);
                return $conn->real_escape_string($string);
            } else
                return $string;
        }
        ?>
