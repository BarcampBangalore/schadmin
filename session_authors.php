<?php


require_once 'knobs.php';
require_once 'header_cli.php';

define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require($WP_BLOG_HEADER_PATH);

header("HTTP/1.1 200 OK");

$query = new WP_Query( array( "cat" => $THIS_BCB_CATEGORY) );
        if ($query->have_posts())
        {
            
            $arraybuilder = array();
            while  ($query->have_posts())
            {
                $query->the_post();
                
                $mypost = array();
//                $mypost['id'] =  get_the_ID();
                $mypost['title'] = get_the_title();
                
                
                
                $userobj = get_user_by("login", get_the_author_meta("user_login"));
                
                
                $mypost['user_name'] = $userobj->data->user_login;
                $mypost['user_email'] = $userobj->data->user_email;
                
//                print_r($mypost);
                
                
                array_push($arraybuilder, $mypost);
                
            }
            
            
            echo "STRUCTURED INFO\n\n\n";
            
            print_r($arraybuilder);
            
            echo "\n////////////////////////////////////////////////////////////////////////////////////\n";
            echo "\n////////////////////////////////////////////////////////////////////////////////////\n";
            echo "\n\n\n COMMA SEPARATED EMAILS \n\n\n";
            
            foreach ($arraybuilder as $item)
            {
                echo $item['user_email'].", ";
            }
            
            
            echo "\n////////////////////////////////////////////////////////////////////////////////////\n";
            echo "\n////////////////////////////////////////////////////////////////////////////////////\n";
            echo "\n\n\n VERTICAL LIST OF USERNAMES \n\n\n";
            
            foreach ($arraybuilder as $item)
            {
                echo $item['user_name']."\n";
            }
            
            
            
            echo "\n////////////////////////////////////////////////////////////////////////////////////\n";
            echo "\n////////////////////////////////////////////////////////////////////////////////////\n";
            echo "\n\n\n VERTICAL LIST OF EMAILS \n\n\n";
            
            foreach ($arraybuilder as $item)
            {
                echo $item['user_email']."\n";
            }
            
            
            echo "\n////////////////////////////////////////////////////////////////////////////////////\n";
            echo "\n////////////////////////////////////////////////////////////////////////////////////\n";
            echo "\n\n\n COMMA SEPARATED USERNAMES\n\n\n";
            
            foreach ($arraybuilder as $item)
            {
                echo $item['user_name'].", ";
            }
            
            
            
        }
        
?>
