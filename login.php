<?php
session_start();

if (isset($_SESSION['auth'])) {
    
    header("Location: index.php");
    
} else {
    
    if (!isset($_REQUEST['mode'])) {
        ?>
        <!DOCTYPE html>
        <html>
            <body>
                <form method="post">
                    <input type="hidden" name="mode" value="login"/>
                    <input type="password" name="password" /><br>
                    <input type="submit" name="submit" value="submit" />
                    
                </form>
            </body>
        </html>


        <?php
    }
    
    elseif ($_REQUEST['mode'] == "login")
    {
        if ($_REQUEST['password'] == "TODO") // TODO: Change as required
        {
            $_SESSION['auth'] = "true";
            header("Location: index.php");
        }
    }
}
?>