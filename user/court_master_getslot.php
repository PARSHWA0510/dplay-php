<?php

$start = new DateTime('08:00'); // Start time
$end = new DateTime('18:00');   // End time
$interval = new DateInterval('PT1H'); // 1-hour interval (PT1H = Period Time 1 Hour)

$period = new DatePeriod($start, $interval, $end); // End is *exclusive*

foreach ($period as $time) {
    echo $time->format("H:i") . " - " . $time->add($interval)->format("H:i") . "\n";
}

?>