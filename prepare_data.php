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
    
    echo $postid." - ".count($attending_users)."\n";
    
    foreach ($attending_users as $user)
    {
        $userobj = get_user_by("login", $user);
        $userid = $userobj->ID;
        
        $stts = mysqli_stmt_bind_param($stmt, "ii", $postid, $userid);
        
        $stts = mysqli_stmt_execute($stmt);
        
        if ($stts ==  false)
        {
            
        }
        
        
    }
    
    
}

?>

Data seems to have been prepared. Move on to <a href="doschedule.php">doscheduling</a>



