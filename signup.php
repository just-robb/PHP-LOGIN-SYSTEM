<?php
    include_once 'header.php';
?>
<section>
    <h2>SIGN UP</h2>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full name.....">
        <input type="text" name="email" placeholder="Email.....">
        <input type="text" name="uid" placeholder="Username.....">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwdrepeat" placeholder="Repeat Password">
        <button type="submit" name="submit">SIGN UP</button>
    </form>
    <?php

        if (isset($_GET["error"])) {
            if ($_GET["error"]=="emptyinput") {
                echo"<p>FIll in all fields</p>";
            }
            else if ($_GET["error"]=="invaliduid"){
                echo"<p>Choose a proper username!</p>";

            }

            else if ($_GET["error"]=="invalidemail"){
                echo"<p>Choose a proper email!</p>";

            }
            else if ($_GET["error"]=="passwordsdontmatch"){
                echo"<p>Passwords dont match</p>";

            }
            else if ($_GET["error"]=="stmtfailed"){
                echo"<p>Something went wrong</p>";

            }
            else if ($_GET["error"]=="usernametaken"){
                echo"<p>username taken</p>";

            }
            else if ($_GET["error"]=="none"){
                echo"<p>Signed up</p>";

            }
        }
?>  

</section> 


<?php
    include_once 'footer.php';
?>