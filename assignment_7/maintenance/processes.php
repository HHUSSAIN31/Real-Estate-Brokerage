<?php 
    require_once('connect.php');

    if(isset($_POST['login']))
    {
       if(empty($_POST['username']) || empty($_POST['password']))
       {
            header("location: https://clabsql.clamv.jacobs-university.de/~hhussain/assignment_7/login/login.php?Empty=Please enter all fields!");
       }
       else
       {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT USERNAME FROM USER_TABLE WHERE USERNAME = '$username' AND PASS = '$password';";
            $result=mysqli_query($connect,$query);

            if(mysqli_fetch_assoc($result))
            {
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['password']=$password;
                header("location: https://clabsql.clamv.jacobs-university.de/~hhussain/assignment_7/maintenance/maintenance-page.php");                
            }
            else
            {
                header("location: https://clabsql.clamv.jacobs-university.de/~hhussain/assignment_7/login/login.php?Invalid= Please Enter Correct User Name and Password! ");
            }
       }
    }
    else
    {
        header("location: https://clabsql.clamv.jacobs-university.de/~hhussain/assignment_7/login/login.php?Invalid= Please reenter all the fields again! ");
        echo 'Please reenter all the fields again ';
    }

?>