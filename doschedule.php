<?php
require_once 'knobs.php';
require_once 'utils.php';
//        require_once 'header_cli.php';
require_once 'header.php';
?>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        

        $snapshots = array();
        $snapshotclash = array();
        $currentschedule = array();    //[$NUM_SLOTS][$NUM_TRACKS] ;

        $snapshot_min = null;
        $snapshot_min_clash = 100000000;
        $snapshots_counter = 0;

        $first_snapshot_mode = true;
        $first_snapshot_found = false;


        for ($i = 0; $i < $NUM_SLOTS; $i++)
        {
            $currentschedule[$i] = array();
            for ($j = 0; $j < $NUM_TRACKS; $j++)
            {
                $currentschedule[$i][$j] = null;
            }
        }



        $selected_sessions = array();


//        $dbcon = mysql_connect("localhost", "scheduling_dummy", "scd");
//        mysql_select_db("scheduling_dummy");
//
////        $result = mysql_query("select * from ( SELECT * FROM $random_table ORDER BY RAND() LIMIT 0," . ($NUM_TRACKS * $NUM_SLOTS) . ") as T1 order by user desc");
//        $result = mysql_query("select * from ( SELECT * FROM (Select session, count(user) as usercount from $random_table
//            group by session) as T2 ORDER BY RAND() LIMIT 0," . ($NUM_TRACKS * $NUM_SLOTS) . ") as T1 order by usercount desc");
//        while ($row = mysql_fetch_assoc($result))
//        {
//            array_push($selected_sessions, array('session' => $row['session'], 'usercount' => $row['usercount']));
//        }
//
//        echo var_dump($currentschedule);
        // Now we have the selected sessions available in descending order of attendees



        $result = mysqli_query($mysql, "SELECT session, count(user) as usercount FROM $random_table group by session order by usercount desc");

        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($selected_sessions, array('session' => $row['session'], 'usercount' => $row['usercount']));
        }

        echo "<pre>SESSIONS FOUND - \n\n". print_r($selected_sessions)."\n\n<pre>";
        
        
        
        
        function scheduleNext($selectedindex, $clashcount)
        {
            global $NUM_SLOTS;
            global $NUM_TRACKS;
            global $currentschedule;
            global $selected_sessions;
            global $snapshots;
            global $snapshotclash;
            global $snapshot_min;
            global $snapshot_min_clash;
            global $snapshots_counter;
            global $first_snapshot_mode, $first_snapshot_found;

            flush();


//            printSnapshot($currentschedule);

            if ($selectedindex == $NUM_SLOTS * $NUM_TRACKS || $selectedindex == (count($selected_sessions)))
            {
                // take snapshot and return
                //////////////////////
//                $snap = $currentschedule;
//                array_push($snapshots, $snap);
//                array_push($snapshotclash, $clashcount);
//
//                printSnapshot($snap);
//                return;
                //////////////////////////

                if ($clashcount < $snapshot_min_clash)
                {
                    $snapshot_min_clash = $clashcount;

                    $snapshot_min = $currentschedule;
                    printSnapshot($currentschedule);
                }

                $snapshots_counter++;
                echo "\nsnap counter " . $snapshots_counter;
                $first_snapshot_found = true;
                return;
            }


            $clash_array = array();
            $position;
            $min = 10000000;

            for ($i = 0; $i < $NUM_SLOTS; $i++)
            {

                $clash = findSlotClash($selectedindex, $i);


                $clash_array[$i] = $clash;
                if ($clash < $min)
                {
                    $min = $clash;
                }
                // also you need to keep track of a copy of schedule at each stage.. global copy wont do
            }


            for ($i = 0; $i < $NUM_SLOTS; $i++)
            {

                if ($clash_array[$i] == $min)
                {
                    $j = 0;
                    while ($j < $NUM_TRACKS && $currentschedule[$i][$j] != null)
                    {
                        $j++;
                    }

                    if ($j == $NUM_TRACKS)
                    {

                        continue;
                    }




                    $currentschedule[$i][$j] = $selected_sessions[$selectedindex];
                    scheduleNext($selectedindex + 1, $clashcount + $min);
                    if ($first_snapshot_mode == true && $first_snapshot_found == true)
                    {
                        break;
                    }
                    $currentschedule[$i][$j] = null;




                    if ($j == 0)
                    {
                        break;
                    }
                }
            }
        }

        function findSlotClash($selectedindex, $slotindex)
        {

            global $currentschedule;
            global $random_table;
            global $NUM_TRACKS;
            global $selected_sessions;
            global $mysql;
            $slotclash = 0;
            for ($m = 0; $m <= $NUM_TRACKS; $m++)
            {
                if ($m == $NUM_TRACKS)
                {
                    return 10000000;
                } else if ($currentschedule[$slotindex][$m] == null)
                {


                    return $slotclash;
                } else
                {
                    $result = mysqli_query($mysql, "select count(*) as clash from (select user, count(session) as s 
                             from (SELECT * From $random_table where session=" . $selected_sessions[$selectedindex]['session'] .
                            " or session=" . $currentschedule[$slotindex][$m]['session'] . ") as T1 group by user having s>1) as T2");

                    $row = mysqli_fetch_assoc($result);
                    $slotclash += $row['clash'];
                }
            }
        }

        function printSnapshot($snap)
        {
            echo "===============================================================\n";
            global $NUM_SLOTS, $NUM_TRACKS;

            for ($i = 0; $i < $NUM_SLOTS; $i++)
            {
                for ($j = 0; $j < $NUM_TRACKS; $j++)
                {
                    echo $snap[$i][$j]['session'] . ", ";
                }
                echo "\n";
            }
        }

//        function existngClash()
//        {
//            global $NUM_SLOTS, $NUM_TRACKS, $bcb11Schedule, $random_table;
//            $clashtotal = 0;
//            for ($i = 0; $i < $NUM_SLOTS; $i++)
//            {
//                for ($j = 0; $j < $NUM_TRACKS; $j++)
//                {
//                    if ($bcb11Schedule[$i][$j] == -2)
//                    {
//                        continue;
//                    }
//                    for ($k = 0; $k < $j; $k++)
//                    {
//
//                        $result = mysql_query("select count(*) as clash from (select user, count(session) as s 
//                             from (SELECT * From $random_table where session=" . $bcb11Schedule[$i][$j] .
//                                " or session=" . $bcb11Schedule[$i][$k] . ") as T1 group by user having s>1) as T2");
//
//                        $row = mysql_fetch_assoc($result);
//                        $clashtotal += $row['clash'];
//                    }
//                }
//            }
//
//
//            echo "Existing clash = " . $clashtotal;
//        }

        scheduleNext(0, 0);
//        existngClash();
//        for ($i = 0; $i < count($snapshots); $i++)
//        {
//            echo "#########################################################";
//            echo "clash - $snapshotclash[$i]\n";
//            printSnapshot($snapshots[$i]);
//        }


        if ($snapshot_min == null)
        {
            echo "WHHOOAAA - no snapshot found.. how the hell did that happen";
        } else
        {
            storeSchedule($snapshot_min);
        }
        ?>
    </body>
</html>
