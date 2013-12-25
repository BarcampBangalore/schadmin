<?php


$mysql = mysqli_connect("localhost", "barcampb_dbuser", "bcb11w1k1", "barcampb_bcbcms");


mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS `sch_generated_schedule` (  `timeslot` int(11) NOT NULL,  `track` int(11) NOT NULL,  `session` int(11) NOT NULL)");

mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS `sch_props_store` (  `option_key` varchar(500) NOT NULL,  `option_val` varchar(1000) NOT NULL,  UNIQUE KEY `unique_key` (`option_key`))");

mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS `sch_selected_sessions` (  `id` int(3) NOT NULL AUTO_INCREMENT,  `post_id` int(10) NOT NULL,  `author` varchar(40) NOT NULL,  `post_title` varchar(1000) NOT NULL,  PRIMARY KEY (`id`),  UNIQUE KEY `unique_post` (`post_id`))");

mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS `sch_session_user_mapping` (  `session` int(11) NOT NULL,  `user` int(11) NOT NULL,  UNIQUE KEY `unique_mapping` (`session`,`user`))");

$result = mysqli_query($mysql, "show tables");

while ($row = mysqli_fetch_array($result))
{
    echo "\n".$row[0];
}



?>
