<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>seek coding</title>
    <link rel="stylesheet" href="login.css">
    <style>
    div.error-text{
        text-align: center;
        color: white;
    }
    </style>
</head>
<?php
    session_start();
    $flag = 0;
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
      if($_SESSION['username'] = "admin" && $_SESSION['password'] = "admin")
      {
          $flag = 1;
      }
    }

?>
<body onload="document.getElementById('login-form').style.display='block'">
    <div class="full-page">
        <div id='login-form'class='login-page'>
            <div class="form-box">
                
                <?php  if(!$flag): ?>
                    <div class='button-box'>
                    <div id='btn'></div>
                        <button type='button'onclick='login()'class='toggle-btn'>REAL ESTATE LOG IN</button>
                    </div>
                    <form id='login' class='input-group-login' action = "https://clabsql.clamv.jacobs-university.de/~hhussain/assignment_7/maintenance/processes.php" method = "post">
                        <input type='text' class='input-field' placeholder='Username' name = "username" required >
                        <input type='password'class='input-field' placeholder='Password' name = "password" required>
                        <input type='checkbox'class='check-box'><span>Remember Password</span>
                        <button type='submit' class='submit-btn' name = 'login'>Log in</button>
                    </form>
                <?php endif;?>

                <?php  if($flag): ?>
                    <br>
                    <div class = "error-text">
                        Already logged in as admin.
                    </div>
                    
                    <form id='login' class='input-group-login' action = "https://clabsql.clamv.jacobs-university.de/~hhussain/assignment_7/login/logout.php?logout" method = "get">
                        <button type='submit' class='submit-btn' name = 'logout'>Log out</button>
                    </form>
                    <br>
                    <br>
                    <a href="https://clabsql.clamv.jacobs-university.de/~hhussain/assignment_7/maintenance/maintenance-page.php">
                        <button type='submit' class='submit-btn' name = 'maintenance'>To maintenance page</button>
                    </a>

                <?php endif;?>

                <?php 
                    if(@$_GET['Empty']==true)
                    {
                ?>
                    <div class = "error-text"><?php echo $_GET['Empty'] ?> </div>                           
                <?php
                    }
                ?>


                <?php 
                    if(@$_GET['Invalid']==true)
                    {
                ?>
                    <div class = "error-text"> <?php echo $_GET['Invalid'] ?> </div>                             
                <?php
                    }
                ?>
    </div>
    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>

</body>
</html>
