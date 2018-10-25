<?php
//calendar-events.php
//https://davidwalsh.name/php-calendar
include("includes/config.php");

$query = mysqli_query($con, "SELECT title, date FROM events");
while($arr = mysqli_fetch_assoc($query)){
    $events[$arr['date']]=['title'=>$arr['title'], 'href'=>'https://www.google.com'];
}


function build_html_calendar($year, $month, $events = null) {

    // CSS classes
    $css_cal = 'calendar';
    $css_cal_row = 'calendar-row';
    $css_cal_day_head = 'calendar-day-head';
    $css_cal_day = 'calendar-day';
    $css_cal_day_number = 'day-number';
    $css_cal_day_blank = 'calendar-day-np';
    $css_cal_day_event = 'calendar-day-event';
    $css_cal_event = 'calendar-event';
  
    // Table headings
    $headings = ['M', 'T', 'W', 'T', 'F', 'S', 'S'];
  
    // Start: draw table
    $calendar =
      "<table cellpadding='0' cellspacing='0' class='{$css_cal}'>" .
      "<tr class='{$css_cal_row}'>" .
      "<td class='{$css_cal_day_head}'>" .
      implode("</td><td class='{$css_cal_day_head}'>", $headings) .
      "</td>" .
      "</tr>";
  
    // Days and weeks
    $running_day = date('N', mktime(0, 0, 0, $month, 1, $year));
    $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
  
    // Row for week one
    $calendar .= "<tr class='{$css_cal_row}'>";
  
    // Print "blank" days until the first of the current week
    for ($x = 1; $x < $running_day; $x++) {
      $calendar .= "<td class='{$css_cal_day_blank}'> </td>";
    }
  
    // Keep going with days...
    for ($day = 1; $day <= $days_in_month; $day++) {

        // Check if there is an event today
        $cur_date = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
        $draw_event = false;
        if (isset($events) && isset($events[$cur_date])) {
            $draw_event = true;
        }
  
        // Day cell
        $calendar .= $draw_event ?
            "<td class='{$css_cal_day} {$css_cal_day_event}'>" :
            "<td class='{$css_cal_day}'>";
  
        // Add the day number
        $calendar .= "<div class='{$css_cal_day_number}'>" . $day . "</div>";
  
        // Insert an event for this day
        if ($draw_event) {
            $calendar .=
            "<div class='{$css_cal_event}'>" .
            "<a href='{$events[$cur_date]['href']}'>" .
            $events[$cur_date]['title'] .
            "</a>" .
            "</div>";
        }
  
        // Close day cell
        $calendar .= "</td>";
  
        // New row
        if ($running_day == 7) {
            $calendar .= "</tr>";
            if (($day + 1) <= $days_in_month) {
            $calendar .= "<tr class='{$css_cal_row}'>";
            }
            $running_day = 1;
        }
  
        // Increment the running day
        else {
            $running_day++;
        }
  
    } // end of for $day
  
    // Finish the rest of the days in the week
    if ($running_day != 1) {
      for ($x = $running_day; $x <= 7; $x++) {
        $calendar .= "<td class='{$css_cal_day_blank}'> </td>";
      }
    }
  
    // Final row
    $calendar .= "</tr>";
  
    // End the table
    $calendar .= '</table>';
  
    // All done, return result
    return $calendar;
}  
/*
$events = [
    $date[0] => [
        'title' => $title[0],
        'href' => "#"
    ],
    $date[1] => [
        'title' => $title[1],
        'href' => "#"
    ],
];
*/
echo "<h2>May 2018</h2>";
echo build_html_calendar(2018, 5, $events);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    /*calendar*/
    table.calendar		{ border-left:1px solid #999; }
    tr.calendar-row	{  }
    td.calendar-day	{ min-height:80px; font-size:11px; position:relative; } * html div.calendar-day { height:80px; }
    td.calendar-day:hover	{ background:#eceff5; }
    td.calendar-day-np	{ background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
    td.calendar-day-head { background:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
    div.day-number		{ background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
    /* shared */
    td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
    </style>
</head>
<body>    
</body>
</html>