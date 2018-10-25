<?php
//class Calendar for use in calendar-events-index.php

class Calendar {

    private $con;
    private $date;
    private $title;
    private $events;

    public function __construct() { }

    function build_html_calendar($year, $month, $events) {

    
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
                                $events[$cur_date]['title'].
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
        echo $calendar;           
    }

}
?>