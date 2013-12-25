<?php
session_start();

?>
<!doctype html>
<html>
    <body>
        <?php
        if (!isset($_SESSION['auth']))
        {
            if (!isset($_REQUEST['mode']))
            {
                ?>
                <form method="post">
                    <input type="hidden" name="mode" value="auth" />
                    Enter Passkey <input type="password" name="passkey" />
                </form>
                <?php
            } elseif ($_REQUEST['mode'] == "auth")
            {
                if ($_REQUEST['passkey'] == "tarantula")
                {
                    $_SESSION['auth'] = "yes";
                    echo "You are logged in please refresh page";
                }
            }
        } else
        {

            if ($_REQUEST['mode'] == "logout")
            {
                unset($_SESSION['auth']);
                echo "you are logged out. Please refresh page";
            } else
            {
                ?>
                <a href="scheduleadmin.php?mode=logout">Logout</a><br><br>
                <form method="post">
                    <input type="hidden" name="mode" value="add_speaker" />
                    Enter Speakers username <input type="text" name="speaker" /><br>
                    <input type="submit" name="submit" value="submit" />
                </form>
                <br><br>
                <h2>Currently selected Sessions</h2>
                <?php
                
                $result = mysql
                
                
                
                ?>
                
                
                
                <?php
            }
        }
        ?>
    </body>
</html>

