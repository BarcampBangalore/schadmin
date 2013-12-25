<?php
require_once 'knobs.php';
include_once 'header.php';
include_once 'utils.php';

define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require($WP_BLOG_HEADER_PATH);

if(isset($_REQUEST['mode'])) {
	$sessions_list = array();
	for($i = 0; $i < $NUM_SLOTS; $i++) {
		for($j = 0; $j < $NUM_TRACKS; $j++) {
			$sessions_list[] = $_REQUEST[$i.'_'.$j];
		}
	}

	$sessions_list_unique = array_unique($sessions_list, SORT_NUMERIC);

//	if(count($sessions_list) == count($sessions_list_unique) ) {
		$submit_array = array();

		for($i = 0; $i < $NUM_SLOTS; $i++) {
			$submit_array[$i] = array();
			for($j = 0; $j < $NUM_TRACKS; $j++) {
				$submit_array[$i][$j] = array( 'session' => $_REQUEST[$i.'_'.$j], 'usercount' => 0 );
			}
		}
		storeSchedule($submit_array);
//	}
//	else {
//		echo count($sessions_list).'  '.count($sessions_list_unique);
//		$message = "Duplicates in the submitted sessions! Please submit again...";
//	}
}

$query = new WP_Query( array( "cat" => $THIS_BCB_CATEGORY) );

$sessions = array();
if($query->have_posts()) {
	while($query->have_posts()) {
		$query->the_post();	

		$this_post = array();
		$this_post['id'] = get_the_ID();
		$this_post['title'] = get_the_title();
		$this_post['author'] = get_the_author();
		//array_push($sessions, $this_post);
		$sessions[get_the_ID()] = $this_post;
	}
}

$schedule = getSchedule();

function printSelect( $sel_name, $curr_session_id ) {
	global $sessions;
	echo '<select name="'.$sel_name.'">';
	foreach($sessions as $session) {
		echo '<option value="'.$session['id'].'"'.($session['id'] == $curr_session_id ? 'selected="selected"' : '').'>'.$session['author'].' - '.$session['title'].'</option>';
	}
	echo '</select>';
}
?>
<html>
	<head>
		<title>Manual Scheduling</title>
		<link type="text/css" rel="stylesheet" href="./schedule.css" />
	</head>
	<body>
		<div id="error_message">
		<?php
		if(isset($message)) {
			echo $message;
		}
		?>
		</div>
		<div id="container">
			<form action="" method="POST">
				<input type="hidden" name="mode" value="true" />
				<table cellpadding="0" cellspacing="0">

					<!-- Table Header -->
					<tr class="head">
					<?php
						echo '<td class="col_0">&nbsp;</td>';
						for($i = 0; $i < $NUM_TRACKS; $i++) {
							echo '<td class="col">';
							echo $TRACKS[$i];
							echo '</td>';
						}
					?>
					</tr>

					<!-- Session info begins here -->
					<?php
					$sessions_count = 0;
					foreach($SLOTS as $SLOT) {
						if($SLOT['type'] == "fixed") {
							echo '<tr class="important_slot">';
							echo '<td class="col_0">'.$SLOT['display_string'].'</td><td colspan="'.($NUM_TRACKS).'">'.$SLOT['name']."</td></tr>";
						}
						else {
							echo '<tr class="normal_slot">';
							echo '<td class="col_0">'.$SLOT['display_string'].'</td>';
							for($i = 0; $i < $NUM_TRACKS; $i++) {
								$curr_id = $schedule[$sessions_count][$i];
								echo '<td class="col">';
								echo '<span class="small">'.truncateTitle($sessions[$curr_id]['title'], 40).'</span>';
								printSelect( $sessions_count."_".$i, $curr_id);
								echo '</td>';
							}
							echo '</tr>';
							$sessions_count++;
						}
					}
					?>
				</table>
				<button type="submit" name="updateSchedule" value="true">Update</button>
			</form>
		</div>
	</body>
</html>
