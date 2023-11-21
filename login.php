<?php
    include_once 'header.php';
?>
<section>
    <h2>LOGIN</h2>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="username/Email.....">
        
        <input type="password" name="pwd" placeholder="Password">
        
        <button type="submit" name="submit">LOGINS</button>
    </form>
    <?php

        if (isset($_GET["error"])) {
            if ($_GET["error"]=="emptyinput") {
                echo"<p>FIll in all fields</p>";
            }
            else if ($_GET["error"]=="wronglogin"){
                echo"<p>incorrect login info</p>";

            }

        }
?>

</section> 

<?php
    include_once 'footer.php';
?>