<?php
require_once 'knobs.php';
require_once 'utils.php';
require_once 'header.php';

?>

<?php ///////////////////////////////////////////////// ?>
<h1>sch_selected_sessions</h1>

<?php 
$result = mysqli_query($mysql, "select * from sch_selected_sessions");

?>

<table border="1">
    <thead>
        <tr>
            <td>id</td>
            <td>post_id</td>
            <td>author</td>
            <td>post_title</td>
        </tr>
    </thead>
    
    <?php
    
    while ($row = mysqli_fetch_assoc($result))
    {
        ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['post_id']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo $row['post_title']; ?></td>
    </tr>
    
    <?php
    }
    
    
    
    
    ?>
    
    
    
</table>





<?php ///////////////////////////////////////////////// ?>
<h1>sch_session_user_mapping</h1>

<?php 
$result = mysqli_query($mysql, "select * from sch_session_user_mapping");

?>

<table border="1">
    <thead>
        <tr>
            <td>session</td>
            <td>user</td>
            
        </tr>
    </thead>
    
    <?php
    
    while ($row = mysqli_fetch_assoc($result))
    {
        ?>
    <tr>
        <td><?php echo $row['session']; ?></td>
        <td><?php echo $row['user']; ?></td>
        
    </tr>
    
    <?php
    }
    
    
    
    
    ?>
    
    
    
</table>


<?php ///////////////////////////////////////////////// ?>
<h1>sch_generated_schedule</h1>

<?php 
$result = mysqli_query($mysql, "select * from sch_generated_schedule");

?>

<table border="1">
    <thead>
        <tr>
            <td>timeslot</td>
            <td>track</td>
            <td>session</td>
            
        </tr>
    </thead>
    
    <?php
    
    while ($row = mysqli_fetch_assoc($result))
    {
        ?>
    <tr>
        <td><?php echo $row['timeslot']; ?></td>
        <td><?php echo $row['track']; ?></td>
        <td><?php echo $row['session']; ?></td>
        
    </tr>
    
    <?php
    }
    
    
    
    
    ?>
    
    
    
</table>


