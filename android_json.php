<?php

require_once 'dbcon.php';
require_once 'props_store.php';
require_once 'utils.php';
require_once 'knobs.php';

//$json_file = "android_bcb15.json";
$json_file = "android.json";
//$json_file = "test.json";

if (isset($_REQUEST['mode']))
{
    if ($_REQUEST['mode'] == "pre")
    {
        
        $pre_event_json = file_get_contents("pre_event.json");
        
        $file = fopen($json_file, "w");
//        echo fwrite($file, json_encode($aj));
        fwrite($file, $pre_event_json);
        fclose($file);

        header('Content-type: application/json');
        print_r($pre_event_json);
        exit;
    }
}

define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require_once($WP_BLOG_HEADER_PATH);
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

function get_bcb_avatar_url($get_avatar)
{
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
        $t['time'] = $slot['display_string'];
        $t['name'] = $slot['name'];
        $t['description'] = $slot['description'];
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
            if ($schedule[$schedulableSlotCounter][$i] != null)
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
                        $s['description'] = get_the_excerpt() . ' <a href="' . get_permalink() . '">Read more</a>';
                        $s['permalink'] = get_permalink();
                        $s['time'] = $slot['display_string'];
                        $s['location'] = $TRACKS[$i];
                        $s['track'] = $i;

                        $userobj = get_user_by("login", get_the_author_meta("user_login"));

                        $s['presenter'] = $userobj->data->display_name;
                        if ($userobj->data->display_name == null || $userobj->data->display_name == "")
                        {
                            $s['presenter'] = $userobj->data->user_nicename;
                        }
                        $photo = get_avatar(get_the_author_meta('ID'), 96);
                        $s['photo'] = get_bcb_avatar_url($photo);

                        
                        $cats = get_the_category();
//                        error_log(var_dump($cats, true));
                        
                        foreach ($cats as $catid => $catobj)
                        {
                            error_log(print_r($catobj->term_id, true));
                            
                            if (array_key_exists($catobj->term_id, $TRACK_COLOR_MAPPING))
                            {
                                $s['category'] = $catobj->name;
                                $s['color'] = $TRACK_COLOR_MAPPING[$catobj->term_id];
                            }
                        }
                        
                        $tags = get_the_tags();
                        foreach ($tags as $tagid => $tagobj)
                        {
                            
                            if (in_array($tagid, $DIFFICULTY_TAGS))
                            {
                                $s['level'] = $tagobj->name;
                                break;
                            }
                        }
                        array_push($t['sessions'], $s);
                    }
                }
            }
        }
        $schedulableSlotCounter++;
    }

    array_push($slotsArray, $t);
}


$aj['slots'] = $slotsArray;
$aj['tracks'] = $TRACKS;

$file = fopen($json_file, "w");
fwrite($file, json_encode($aj));
fclose($file);

header('Content-type: application/json');
echo json_encode($aj);

//print_r($aj);
?>
