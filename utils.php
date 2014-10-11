<?php

require_once 'dbcon.php';

function storeSchedule($scharray) 
{
    global $mysql, $NUM_SLOTS, $NUM_TRACKS;
 
    
    error_log(print_r($scharray, true));
    
    mysqli_query($mysql, "delete from sch_generated_schedule");
    $stmt = mysqli_prepare($mysql, "insert into sch_generated_schedule (timeslot, track, session) values (?, ?, ?)");
    for ($i = 0; $i < $NUM_SLOTS; $i++) {
        for ($j = 0; $j < $NUM_TRACKS; $j++) {
            
            
            $store_session = null;
            
            if ($scharray[$i][$j] != null)
            {
                $store_session = $scharray[$i][$j]['session'];
            }
            
            
            mysqli_stmt_bind_param($stmt, "iii", $i, $j, $store_session);
            mysqli_stmt_execute($stmt);
        }
        
    }
}

function getSchedule()
{
	global $mysql, $NUM_SLOTS, $NUM_TRACKS;

	$scharray = array();
	for($i = 0;  $i < $NUM_SLOTS; $i++) {
		$scharray[$i] = array();
		for($j = 0; $j < $NUM_TRACKS; $j++) {
			$scharray[$i][$j] = null;
		}
	}

	$res = mysqli_query($mysql, "SELECT timeslot, track, session FROM sch_generated_schedule");
	while($row = mysqli_fetch_assoc($res)) {
		$timeslot = $row['timeslot'];
		$track = $row['track'];
		$scharray[$timeslot][$track] = $row['session'];
	}

	return $scharray;
}

function truncateTitle( $title, $length = 60) {
	if(strlen($title) >= $length) {
		$title = substr($title, 0, $length);
		if(strrpos($title, ' ') != strlen($title)) {
			$title = substr($title, 0, strrpos($title, ' '));
		}
		$title = $title . '...';
	}
	return $title;
}
?>
