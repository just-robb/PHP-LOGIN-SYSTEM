<?php
 session_start()
?>


<!DOCTYPE html>
<html>
    <head>
        <title>PHP Project</title>
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <nav>
            <div class="navigation">
                <ul class="navul">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contacts</a></li>
                    <?php
                      if (isset($_SESSION["useruid"])) {
                       echo "<li><a href='profile.php'>Profile page</a></li>";
                       echo "<li><a href='includes/logout.inc.php'>Sign up</a></li>";
                      }
                      else{
                        echo "<li><a href='login.php'>login</a></li>";
                        echo "<li><a href='signup.php'>Sign up</a></li>";

                      }
                    ?>
                    
                </ul>
            </div>
        </nav>