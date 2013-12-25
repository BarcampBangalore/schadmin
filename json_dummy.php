<?php

$a = array();

// all data indexes start from 1

$a['status'] = "have stuff";
$a['timecells_version'] = 23;

$a['timecells'] = array();
$timecells = &$a['timecells'];

$timecells[1] = array();
$timecells[2] = array();
$timecells[3] = array();
$timecells[6] = array(); // the lunch break
$timecells[7] = array(); // tecklash


$timecell1 = &$timecells[1];
$timecell1['type'] = "admin_strict";
$timecell1['title'] = "Registrations";
$timecell1['begin_time'] = "8 AM"; // this will be a real timestamp
$timecell1['begin_time_string'] = "800";


$timecell2 = &$timecells[2];
$timecell2['type'] = "admin_strict";
$timecell2['title'] = "Intro";
$timecell2['begin_time'] = "9 AM"; // this will be a real timestamp
$timecell2['begin_time_string'] = "900";


$timecell3 = &$timecells[3];
$timecell3['type'] = "session_slot";
$timecell3['title'] = "Slot 1";
$timecell3['begin_time'] = "9:30 AM"; // this will be a real timestamp
$timecell3['begin_time_string'] = "930";
$timecell3['sessions'] = array();
$timecell3['sessions'][1] = array();
$timecell3['sessions'][1]['title'] = "Mobile Analytics";
$timecell3['sessions'][1]['author_name'] = "Some Guy";
$timecell3['sessions'][1]['desc'] = "some long text for the description.";
$timecell3['sessions'][1]['venue'] = "COBOL";
$timecell3['sessions'][1]['begin_time_string'] = "000";
$timecell3['sessions'][1]['duration_string'] = "9:30am to 10:30am";
$timecell3['sessions'][1]['post_id'] = "1234"; // thsi is used for app side data storage for the session like the notification.
$timecell3['sessions'][2] = array();
$timecell3['sessions'][2]['title'] = "The Art of Brain";
$timecell3['sessions'][2]['author_name'] = "Brainy Guy";
$timecell3['sessions'][2]['desc'] = "another long text for the description.";
$timecell3['sessions'][2]['venue'] = "ERLANG";
$timecell3['sessions'][2]['begin_time_string'] = "1030 hrs";
$timecell3['sessions'][2]['duration_string'] = "10:30am to 11:30am";
$timecell3['sessions'][2]['post_id'] = "2345"; // thsi is used for app side data storage for the session like the notification.


$timecell6 = &$timecells[6];
$timecell6['type'] = "admin_strict"; // the mode field will decide how this node should be decorated currently. It will contain other fields depending on the mode.
$timecell6['title'] = "Lunch";
$timecell6['begin_time'] = "12:30 PM"; // this will be a real timestamp
$timecell6['begin_time_string'] = "1230 hrs";


$timecell7 = &$timecells[7];
$timecell7['type'] = "techlash";
$timecell7['title'] = "Techlash";
$timecell7['begin_time'] = "2 PM"; // this will be a real timestamp
$timecell7['begin_time_string'] = "1300 hrs";



$a['notifications_maxid'] = 5;
$a['notifications'] = array();
$notifications = &$a['notifications'];
$notifications[1] = array();
$notifications[2] = array();

$n1 = &$notifications[1];
$n1['id'] = 4;
$n1['created_time'] = "123435"; // this will be a proper timestamp;
$n1['message'] = "This is to notify you that blah blah";

$n2 = &$notifications[2];
$n2['id'] = 5;
$n2['created_time'] = "6423354"; // this will be a proper timestamp;
$n2['message'] = "This is also to notify you that meh meh meh";





















echo json_encode($a, JSON_PRETTY_PRINT);














?>
