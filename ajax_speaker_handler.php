<?php
require_once 'knobs.php';
include_once 'header.php';

define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require($WP_BLOG_HEADER_PATH);

header("HTTP/1.1 200 OK");

function sortByAttendies($a, $b)
{
    if ($a['attendies'] == $b['attendies'])
    {
        return 0;
    }
    
    return $a['attendies'] > $b['attendies'] ? -1 : 1;
}





if (isset($_REQUEST['mode']))
{
    if ($_REQUEST['mode'] == "list_sessions")
    {
        $jsonbuilder = array();
        $query = new WP_Query( array( "cat" => $THIS_BCB_CATEGORY, "author_name" => $_REQUEST['speaker']) );
        if ($query->have_posts())
        {
            while  ($query->have_posts())
            {
                $query->the_post();
                
                $mypost = array();
                $mypost['id'] =  get_the_ID();
                $mypost['title'] = get_the_title();
                
                $mypost['attendies'] = count(attending_users($mypost['id']));
//                print_r($attending_users);
                
                
                
                
                array_push($jsonbuilder, $mypost);
                
            }
        }
        
        uasort($jsonbuilder, 'sortByAttendies');
        
        
        echo json_encode($jsonbuilder);
        
    }
    
    
    else if ($_REQUEST['mode'] == "register_sessions")
    {
        $sessions = $_REQUEST['sessions'];
        
        print_r($sessions);
        
        $query = new WP_Query( array( 'post_type' => 'post', 'post__in' => $sessions ) );
        
        if ($query->have_posts())
        {
            $stmt = mysqli_prepare($mysql, "insert into sch_selected_sessions (post_id, author, post_title) values (?, ?, ?)");
            while  ($query->have_posts())
            {
                $query->the_post();
                
                
                
                mysqli_stmt_bind_param($stmt, "iss", get_the_ID(), get_the_author_meta( "user_login" ), get_the_title());
                mysqli_stmt_execute($stmt);
                
                
                
            }
        }
        
        
        
    }
    
    
    else if ($_REQUEST['mode'] == "refresh_pool")
    {
        $result = mysqli_query($mysql, "select * from sch_selected_sessions");
        $jsonbuilder = array();
        $jsonbuilder['status'] = "OK";
        $jsonbuilder['sessions'] = array();
        
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($jsonbuilder['sessions'], $row);
        }
        
        echo json_encode($jsonbuilder);
    }
    
    else if ($_REQUEST['mode'] == "remove_session")
    {
        $result = mysqli_query($mysql, "delete from sch_selected_sessions where post_id=".$_REQUEST['session']);
        echo "OK";
    }
    
    else if ($_REQUEST['mode'] == "clear_pool")
    {
        mysqli_query($mysql, "delete from sch_selected_sessions");
    }
    
}



?>
