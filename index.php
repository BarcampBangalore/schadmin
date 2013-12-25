<?php
require_once 'knobs.php';
require_once 'header.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Add Speakers</title>
        <script src="scripts/jquery-1.7.2.js" ></script>
        <script type="text/javascript" >
        
            function postSpeaker()
            {
                $("#sessions_table").html("<thead><tr><th>Title</th><th>Attendies</th><th>Select</th><th>Remove</th></tr></thead>");
                $.post("ajax_speaker_handler.php", {mode : "list_sessions", speaker : $("#speakerid").val()}, function(data){
                
                    
                    for(var key in data)
                    {
                        var temp = "<tr>";
                        temp += "<td>" + data[key].title + "</td>";
                        temp += "<td>" + data[key].attendies + "</td>";
                        temp += '<td><input type="checkbox" name="user_session" value="' + data[key].id + '" /></td>';
                        
                        
                        
                        temp += "</tr>";
                        
                        
                        $("#sessions_table").append(temp);
                        
                        
                    }
                    
                    var temp = "<br><br>" + '<input type="submit" name="submit" value="submit" />';
                    
                    $("#sessions_table").append(temp);
                
        
                
                
                
                }, "json");
            
            }
            
            
            function postSessionList()
            {
                
                var senddata = new Object(); 
                var sessions = new Array();
                senddata.mode = "register_sessions";
                $('#sessions_table input[name="user_session"]:checked').each(function(){
                    // 
                    sessions.push($(this).val());
                    //                    alert($(this).val());
                    
                });
                
                
                senddata.sessions = sessions;
                
                $.post("ajax_speaker_handler.php", senddata, function(data){
                    
                    refresh_currentpool();
                    
                    
                }, "text");
                
                
                
            }
            
            function remove_session(id)
            {
                $.post("ajax_speaker_handler.php", {mode : "remove_session", session: id}, function(data){
                    if (data != "OK")
                    {
                        alert("Error  in deletion");
                    }
                         
                    refresh_currentpool();
                }, "text");
            }
            
            function refresh_currentpool()
            {
                $.post("ajax_speaker_handler.php", {mode : "refresh_pool"}, function(data){
                    
                    if (data.status == "OK")
                    {
                        
                        var temp = "<thead><tr>";
                            temp += "<td>S. No.</td>";
                            temp += "<td>Author</td>";
                            temp += "<td>Title</td>";
                            temp += "<td>Post Id</td>";
                            temp += '<td>Remove</td>';
                            temp += "</tr></thead>";
                        
                        $("#currentpool_table").html("");
                        var i=0;
                        for (var key in data.sessions)
                        {
                            var temp = "<tr>";
                            temp += "<td>" + (++i) + "</td>";
                            temp += "<td>" + data.sessions[key].author + "</td>";
                            temp += "<td>" + data.sessions[key].post_title + "</td>";
                            temp += "<td>" + data.sessions[key].post_id + "</td>";
                            temp += '<td><a href="javascript:remove_session(' + data.sessions[key].post_id +')">Remove</a></td>';
                            temp += "</tr>";
                                
                            $("#currentpool_table").append(temp);
                            
                        }
                        
                        $("#currentpool_count").html(i);
                        
                        if (i != <?php echo $NUM_CELLS; ?> )
                        {
                            $("#scheduling_link").hide();
                        }
                        else
                        {
                            $("#scheduling_link").show();
                        }
                        
                    }
                    
                }, "json");
            }
            
            
            
            $(function(){
            
                $("#refreshpool_button").click(function(){
                    refresh_currentpool();
                });
                
                refresh_currentpool();
            
            
            });
            
            
        
    
        </script>
    </head>
    <body>
        <?php include 'nav.php'; ?>
        <br><br>
        <form action="javascript:postSpeaker()">

            Enter Speaker username <input type="text" name="speakerid" id="speakerid" />
            <input type="submit" name="submit" value="submit" />
        </form>
        <br><br>
        <div id="session_list">
            <form id="sessions_form" action="javascript:postSessionList()">
                <table id="sessions_table" border="1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Attendies</th>
                            <th>Select</th>
                            
                        </tr>
                    </thead>

                </table>
            </form>
        </div>

        <hr>
        <h2>Current Pool - <span id="currentpool_count"></span></h2> <button id="refreshpool_button">Refresh</button>
        <table  id="currentpool_table" border="1" >

        </table>


        <a href="prepare_data.php" id="scheduling_link">Start Scheduling</a>

    </body>
</html>
