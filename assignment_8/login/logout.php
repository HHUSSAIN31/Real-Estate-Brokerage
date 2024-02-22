<?php 
    session_start();
    if(isset($_GET['logout']))
    {
        session_destroy();
        header("location: https://clabsql.clamv.jacobs-university.de/~hhussain/assignment_8/login/login.php");
    }

?>