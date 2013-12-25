<?php

require_once 'knobs.php';

define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require($WP_BLOG_HEADER_PATH);

header("HTTP/1.1 200 OK");


$cat = get_category_by_slug( "BCB11" );

print_r($cat);


?>
