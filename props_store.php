<?php

require_once 'dbcon.php';

function getProperty($key)
{
    global $mysql;
    $result = mysqli_query($mysql, "select * from sch_props_store where option_key ='".$key."'");
    
    $row = mysqli_fetch_assoc($result);
    
    if ($row == false)
    {
        return null;
    }
    else
    {
        return $row['option_val'];
    }
    
    
    
}


function setProperty($key, $val)
{
    global $mysql;
    
    return mysqli_query($mysql, "replace into sch_props_store (option_key, option_val) values ('".$key."','".$val."')");
    
    
}





?>
