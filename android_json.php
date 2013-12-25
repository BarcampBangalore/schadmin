<?php
require_once 'dbcon.php';
require_once 'props_store.php';
require_once 'utils.php';
require_once 'knobs.php';


if (isset($_REQUEST['mode']))
{
    if ($_REQUEST['mode'] == "pre")
    {
        $aj = array();
        $aj['status'] = 'The schedule for Barcamp is created on the morning itself. In the mean time have a look at the <a href="http://barcampbangalore.org/bcb/sessions">registered sessions</a> for this barcamp.';
        $file = fopen("android_bcb14.json", "w");
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
$aj['status'] = "have stuff";

$version = getProperty("ANDROID_JSON_VERSION");
if ($version == null)
{
    $version = 0;
}

$version++;
$aj['version'] = $version;



setProperty("ANDROID_JSON_VERSION", $version);

$schedule = getSchedule();


$slotCounter = 0;
$schedulableSlotCounter = 0;

$slotsArray = array();

function get_avatar_url($get_avatar){
    preg_match("/src=['\"](.*?)['\"]/i", $get_avatar, $matches);
    return $matches[1];
}


foreach ($SLOTS as $slot)
{
    $t = array();
    if ($slot['type'] == "fixed")
    {
        
        $t['type'] = 'fixed';
        $t['startTime'] = $slot['start'];
        $t['endTime'] = $slot['end'];
        $s['time'] = $slot['display_string'];
        $t['name'] = $slot['name'];
        $t['id'] = ++$slotCounter;
    } else
    { // type session
        
        $t['type'] = "session";
        $t['startTime'] = $slot['start'];
        $t['endTime'] = $slot['end'];
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
                    $s['description'] = get_the_excerpt().' <a href="'.get_permalink().'">Read more</a>';
                    $s['permalink'] = get_permalink();
                    $s['time'] = $slot['display_string'];
                    $s['location'] = $TRACKS[$i];
                    
                    $userobj = get_user_by("login", get_the_author_meta("user_login"));
                    
                    $s['presenter'] = $userobj->data->display_name;
                    if($userobj->data->display_name == null || $userobj->data->display_name == ""){
	                    $s['presenter'] = $userobj->data->user_nicename;
                    }
                    $photo = get_avatar( get_the_author_meta('ID'), 96 );
                    $s['photo'] = get_avatar_url($photo);
                    array_push($t['sessions'], $s);
                           
                }
            }
        }
        $schedulableSlotCounter++;
        
    }
    
    array_push($slotsArray, $t);
    
    
    
    
}


$aj['slots'] = $slotsArray;

$file = fopen("android_bcb14.json","w");
 echo fwrite($file,  json_encode($aj));
 fclose($file);

print_r($aj);
?>
