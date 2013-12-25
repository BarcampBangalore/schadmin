<?php

require_once 'header.php';
require_once 'props_store.php';
require_once 'utils.php';
require_once 'knobs.php';



if (isset($_REQUEST['mode']))
{
    if ($_REQUEST['mode'] == "pre")
    {
        $aj = array();
        $aj['status'] = 'The schedule for Barcamp is created on the morning itself. It will be available accordingly.';
        $file = fopen("web.json", "w");
        echo fwrite($file, json_encode($aj));
        fclose($file);

        print_r($aj);
        exit;
    }
}


define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require($WP_BLOG_HEADER_PATH);
header("HTTP/1.1 200 OK");

$aj = array();


$version = getProperty("ANDROID_JSON_VERSION");

$aj['version'] = $version;
$aj['status'] = "have stuff";
$aj['tracks'] = $TRACKS;


$schedule = getSchedule();


$slotCounter = 0;
$schedulableSlotCounter = 0;

$slotsArray = array();




foreach ($SLOTS as $slot)
{
    $t = array();
    if ($slot['type'] == "fixed")
    {
        
        $t['type'] = 'fixed';
        $t['startTime'] = $slot['start'];
        $t['endTime'] = $slot['end'];
        $t['time'] = $slot['display_string'];
        $t['name'] = $slot['name'];
        $t['id'] = ++$slotCounter;
    } else
    { // type session
        
        $t['type'] = "session";
        $t['startTime'] = $slot['start'];
        $t['endTime'] = $slot['end'];
        $t['time'] = $slot['display_string'];
        $t['name'] = $slot['name'];
        $t['id'] = ++$slotCounter;

        $t['sessions'] = array();

        for ($i = 0; $i < $NUM_TRACKS; $i++)
        {
            $s = array();
            $wpquery = new WP_Query(array("p" => $schedule[$schedulableSlotCounter][$i]));

            if ($wpquery->have_posts())
            {
                while ($wpquery->have_posts())
                {
                    $wpquery->the_post();

                    
                    $s['id'] = get_the_ID();
                    $s['title'] = get_the_title();
                    $s['time'] = $slot['display_string'];
                    $s['location'] = $TRACKS[$i];
                    
                    $userobj = get_user_by("login", get_the_author_meta("user_login"));
                    $s['presenter'] = $userobj->data->user_nicename;
                    
                    array_push($t['sessions'], $s);
                           
                }
            }
        }
        $schedulableSlotCounter++;
        
    }
    
    array_push($slotsArray, $t);
    
    
    
    
}


$aj['slots'] = $slotsArray;

$file = fopen("web.json","w");
 echo fwrite($file,  json_encode($aj));
 fclose($file);

print_r($aj);
?>
