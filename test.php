<?php
require_once 'knobs.php';
include_once 'header.php';

define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require($WP_BLOG_HEADER_PATH);

header("HTTP/1.1 200 OK");

echo "testing... ";

?>
