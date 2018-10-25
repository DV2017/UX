
<?php
//uses ajax to send user input month and date
//see companion files: calendar-events-ajax.php and Calendar.php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../js/jquery-3.2.1.js"></script>

<style>
    /*calendar*/
    table.calendar {border-left: 1px solid #999;}
    td.calendar-day {min-height:80px; font-size:11px; position:relative;}
    td.calendar-day:hover {background: salmon;}
    td.calendar-day-np {background:#eee; min-height:80px;}
    td.calendar-day-head {
        background:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; 
        border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999;
    }
    div.day-number {
        background:#999; padding:5px; color:#fff; font-weight:bold; 
        float:right; margin:-5px -5px 0 0; width:20px; text-align:center;
    }
    td.calendar-day, td.calendar-day-np {
        width:120px; padding:5px; border-bottom:1px solid #999; 
        border-right:1px solid #999;
    }
</style>


</head>
<body>
<!-- user selects month and day from a calendar. an ajax is sent to retrieve events and 
display in the browser -->
    <h2>May 2018</h2>
    <div class="show-calendar"></div>

    <script>
    var month = 5;
    var year = 2018;
    //ajax request to display calendar
    $(document).ready(function(){
        //to do: set the post to a click function in the calendar
        
        $.post(
                "calendar-events-ajax.php", 
                { month: month, year: year}, 
                function(data){
                    $(".show-calendar").html(data);
                });
    });
    
    
    </script>
</body>
</html>