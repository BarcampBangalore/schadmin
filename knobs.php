<?php

// dummy data generation

$num_users = 2000;
$num_sessions = 60;
$max_session_per_user = 15;



// scheduling
$NUM_TRACKS = 6;
$NUM_SLOTS = 6;

$NUM_CELLS = $NUM_SLOTS * $NUM_TRACKS;

// this is the category number for the current barcamp. 
$THIS_BCB_CATEGORY = 1057;  //bcb 16


//$THIS_BCB_CATEGORY = 4 ;

$WP_BLOG_HEADER_PATH = '../bcb/wp-blog-header.php';

//$WP_BLOG_HEADER_PATH = '../wordpressacer/wp-blog-header.php';

// This is not random table but the table which contains the session to user mapping. 
// The variable name is unfornately such due to historic reasons
$random_table = 'sch_session_user_mapping';
//$random_table = "table0";

// Arrays to loop over


$TRACKS = array('Asteroids', 'Battleship', 'Contra', 'Diablo', 'Everquest', 'Fable');
$SLOTS = array();

/*
 * Old session slots
$SLOTS[] = array("type" => "fixed", "start" => "0800", "end" => "0900", "display_string" => "8:00AM - 9:00AM", "name" => "Registration" );
$SLOTS[] = array("type" => "fixed", "start" => "0900", "end" => "0930", "display_string" => "9:00AM - 9:30AM", "name" => "Introduction" );
$SLOTS[] = array("type" => "session", "start" => "0930", "end" => "1015", "display_string" => "9:30AM - 10:15AM", "name" => "Slot 1" );
$SLOTS[] = array("type" => "session", "start" => "1030", "end" => "1115", "display_string" => "10:30AM - 11:15AM", "name" => "Slot 2" );
$SLOTS[] = array("type" => "session", "start" => "1130", "end" => "1215", "display_string" => "11:30AM - 12:15AM", "name" => "Slot 3" );
$SLOTS[] = array("type" => "fixed", "start" => "1230", "end" => "1330", "display_string" => "12:30AM - 13:30AM", "name" => "Lunch" );
$SLOTS[] = array("type" => "fixed", "start" => "1330", "end" => "1430", "display_string" => "1:30PM - 2:30PM", "name" => "Techlash" );
$SLOTS[] = array("type" => "session", "start" => "1430", "end" => "1515", "display_string" => "2:30PM - 3:15PM", "name" => "Slot 4" );
$SLOTS[] = array("type" => "session", "start" => "1530", "end" => "1615", "display_string" => "3:30PM - 4:15PM", "name" => "Slot 5" );
$SLOTS[] = array("type" => "session", "start" => "1630", "end" => "1715", "display_string" => "4:30PM - 5:15PM", "name" => "Slot 6" );
$SLOTS[] = array("type" => "fixed", "start" => "1730", "end" => "1815", "display_string" => "5:30PM - 6:15PM", "name" => "Feedback" );
 */

//New session slots
$SLOTS[] = array("type" => "fixed", "start" => "0800", "end" => "0900", "display_string" => "8:00AM - 9:00AM", "name" => "Registration" );
$SLOTS[] = array("type" => "fixed", "start" => "0900", "end" => "0930", "display_string" => "9:00AM - 9:30AM", "name" => "Introduction" );
$SLOTS[] = array("type" => "session", "start" => "0945", "end" => "1030", "display_string" => "9:45AM - 10:30AM", "name" => "Slot 1" );
$SLOTS[] = array("type" => "fixed", "start" => "1030", "end" => "1100", "display_string" => "10:30AM - 11:00AM", "name" => "Break 1" );
$SLOTS[] = array("type" => "session", "start" => "1100", "end" => "1145", "display_string" => "11:00AM - 11:45AM", "name" => "Slot 2" );
$SLOTS[] = array("type" => "session", "start" => "1145", "end" => "1230", "display_string" => "11:45AM - 12:30AM", "name" => "Slot 3" );
$SLOTS[] = array("type" => "fixed", "start" => "1230", "end" => "1330", "display_string" => "12:30AM - 13:30AM", "name" => "Lunch" );
$SLOTS[] = array("type" => "fixed", "start" => "1330", "end" => "1430", "display_string" => "1:30PM - 2:30PM", "name" => "Techlash" );
$SLOTS[] = array("type" => "session", "start" => "1430", "end" => "1515", "display_string" => "2:30PM - 3:15PM", "name" => "Slot 4" );
$SLOTS[] = array("type" => "fixed", "start" => "1515", "end" => "1545", "display_string" => "3:15PM - 3:45PM", "name" => "Break 2" );
$SLOTS[] = array("type" => "session", "start" => "1545", "end" => "1630", "display_string" => "3:45PM - 4:30PM", "name" => "Slot 5" );
$SLOTS[] = array("type" => "session", "start" => "1630", "end" => "1715", "display_string" => "4:30PM - 5:15PM", "name" => "Slot 6" );
$SLOTS[] = array("type" => "fixed", "start" => "1730", "end" => "1815", "display_string" => "5:30PM - 6:15PM", "name" => "Feedback" );

$TRACK_COLOR_MAPPING = array( 
    1058 => "#770B47", 
    1059 => "#0B5477", 
    1060 => "#211B6D", 
    1061 => "#789C18", 
    1062 => "#2D88EC", 
    1063 => "#E28815", 
    1064 => "#701E7F", 
    1065 => "#9E2B1C" );

$DIFFICULTY_TAGS = array(945, 947, 946);
?>
