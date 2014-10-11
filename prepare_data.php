<?php
require_once 'knobs.php';
require_once 'header.php';

define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require($WP_BLOG_HEADER_PATH);

header("HTTP/1.1 200 OK");


$result = mysqli_query($mysql, "select * from sch_selected_sessions");

mysqli_query($mysql, "delete from sch_session_user_mapping");

$stmt = mysqli_prepare($mysql, "insert into sch_session_user_mapping (session, user) values (?, ?)");

while ($row = mysqli_fetch_assoc($result))
{
    $postid = $row['post_id'];
    
    $attending_users = attending_users($postid);
    
    
    echo "\n\n<br><br>POST - " .$postid." - ".count($attending_users)."<br><br>\n";
    
    echo "\n<br>XXXAttending Users - ".print_r($attending_users, true);
    
    foreach ($attending_users as $user)
    {
        echo "\n<br>User : ".$user;
        $userobj = get_user_by("login", $user);
        $userid = $userobj->ID;
        echo "<br><pre>";
        echo print_r($userobj, true);
        echo "</pre><br>";
        
        if ($userid != null)
        {
            $stts = mysqli_stmt_bind_param($stmt, "ii", $postid, $userid);

            $stts = mysqli_stmt_execute($stmt);

            if ($stts ==  false)
            {
                echo "\n<br>Error while adding session-user mapping : $postid - $userid";
                echo "\n<br>Error Message - ".mysqli_error($mysql);
            }

        }
    }
    
    
}

?>

Data seems to have been prepared. Move on to <a href="doschedule.php">doscheduling</a>



