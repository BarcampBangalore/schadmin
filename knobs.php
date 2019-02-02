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
$THIS_BCB_CATEGORY = 1556;  //bcb 18


//$THIS_BCB_CATEGORY = 4 ;

$WP_BLOG_HEADER_PATH = '../wp-blog-header.php';

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


// put the descriptions for fixed sessions
$SLOTS[0]["description"] = "Registration will start at 8am. If you are a planning to take a session, please be there by 8am as the slots are available only on first come first serve basis";
$SLOTS[1]["description"] = "This your chance to learn how Barcamp is different for your regular conference. Veterans please take time to educate the new participants about the philosphy of the event";
$SLOTS[3]["description"] = "First Break. Have tea/coffee and meet with people. Interesting conversations brew up in the breaks";
$SLOTS[6]["description"] = "Lunch Hour. Give the brain a rest and feed the stomach";
$SLOTS[7]["description"] = "Techlash is barcamp on rapidfire. Quick 6 min sessions showcasing amazing stuff people have been working on.";
$SLOTS[9]["description"] = "Second Break. Have tea/coffee and meet with people. Interesting conversations brew up in the breaks";
$SLOTS[12]["description"] = "Feedback Session. In a BCB tradition we all meet at the end of the day and talk about what was good and what can be done better";

//hack
//$TRACK_COLOR_MAPPING = array( 
//    1460 => "#770B47", // design
//    1462 => "#E4460B", // mobile web
//    1466 => "#0B83E4", // technology
//    1464 => "#789C18", // scaling and infra
//    1459 => "#2D88EC", // bangalore lifestyle
//    1461 => "#E28815", // entrepreneurship
//    1463 => "#701E7F", // rest of the world
//    933 => "#9E2B1C", 
//    1065 => "#9E2B1C" ); // techlash

// $TRACK_COLOR_MAPPING = array( 
//     1761 => "#770B47", // design
//     1559 => "#E4460B", // mobile web
//     1563 => "#E40B6C", // technology
//     1561 => "#789C18", // scaling and infra
//     1564 => "#2D88EC", // bangalore lifestyle
//     1558 => "#E28815", // entrepreneurship
//     1560 => "#701E7F", // rest of the world
//     933 => "#9E2B1C", 
//     1562 => "#9E2B1C" ); // techlash


// Spring 2019
$TRACK_COLOR_MAPPING = array( 
    1760 => "#f79423", // Blr & Lifestyle
    1761 => "#ef5768", // Design
    1762 => "#613516", // Entrepreneurship
    1763 => "#507aa5", // mobile & web
    1764 => "#7cb241", // Rest of the world
    1765 => "#000000", // scaling & infra
    1767 => "#f2e40c", // technology
    933 => "#9E2B1C", 
    1766 => "#9E2B1C" ); // techlash





$DIFFICULTY_TAGS = array(945, 947, 946);
?>
