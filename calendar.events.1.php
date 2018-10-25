<?php
//https://davidwalsh.name/php-calendar
//http://blog.netgloo.com/2015/08/01/php-build-an-html-calendar
    function draw_calendar($month, $year, $events=null){
        /*draw table: open the table */
        $calendar = "<table cellpadding='0' cellspacing='0' class='calendar'>";

        $headings = array(
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        );

        /* table headings */
        /* implode joins array elements with string */
        /* td is a data cell*/
        $calendar .= "<tr class='calendar-row'>
                        <td class='calendar-day-head'>"
                        .implode("</td><td class='calendar-day-head'>", $headings).
                        "</td>
                    </tr>";
        /* days and weeks now in place *//* w - numeric representation of the day of the week, 0 for sunday */
        /* t - number of days in a month */
        $running_day = date('N', mktime(0,0,0,$month,1,$year));
        $days_in_month = date('t', mktime(0,0,0,$month,1,$year));

        /* start the row for week 1 */
        $calendar .= "<tr class='calendar-row'>";

        /*printing blank days untl the 1st of the current month */
        for($x=1; $x<$running_day;$x++):
            $calendar .= "<td class='calendar-day-np'> </td>";
        endfor;

        /*  keep going with days in the row for the week */
        for($day = 1; $day <= $days_in_month; $day++):

            /*check for event this day */
            $cur_date = date("Y-m-d", mktime(0,0,0,$month, $day, $year));
            $draw_event = false;
            if(isset($events) && isset($events[$cur_date]))
                $draw_event = true;

            $calendar .= $draw_event ?
                "<td class='calendar-day calendar-day-event'>" : 
                "<td class='calendar-day'>";

            $calendar .= "<div class='day-number'>". $day ."</div>";
            
            /* insert the event into the cell */
            if($draw_event)
                $calendar .= "<div class='calendar-event'>" .
                                "<a href='{$events[$cur_date]['href']}'>".
                                $events[$cur_date]['text'].
                                "</a>".    
                             "</div>";
            //end of if
            /*close day cell */
            $calendar .= "</td>";

            /* new row */
            if($running_day == 7){
                $calendar .= "</tr>"; //close the calendar row
                if(($day + 1) <= $days_in_month)
                    $calendar .= "<tr class='calendar-row'>";
                $running_day = 1;
            } else{
                $running_day++;
            }            
        endfor;

        /* finish the rest of the days in the week */
        if($running_day != 1):
            for($x=$running_day; $x<=7; $x++):
                $calendar .= "<td class='calendar-day-np'> </td>";
            endfor;
        endif;
        
        /*final row*/
        $calendar .= "</tr>";

        /*end the table*/
        $calendar .= "</table>";

        /* all done, return result */
        return $calendar;           
    }

$events = [
    '2018-05-05' => [
        'text' => "An event for the 5 May 2018",
        'href' => "#"
    ],
    '2018-05-23' => [
        'text' => "An event for the 23 May 2018",
        'href' => "#"
    ],
];
    
echo "<h2>May 2018</h2>";
echo draw_calendar(5, 2018, $events);
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
</body>
</html>