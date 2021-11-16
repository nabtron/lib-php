<?php

// create date from a format
$date = DateTime::createFromFormat('d/m/Y', $date);

// set timezone for date time
$date->setTimeZone(new DateTimeZone('America/New_York'));

// set new format for date
$date = $date->format('Y-m-d');

// find difference between old date and today (e.g. calculate age)
$tz  = new DateTimeZone('Europe/Brussels');
$age = DateTime::createFromFormat('d/m/Y', '12/02/1973', $tz)
     ->diff(new DateTime('now', $tz))
     ->y;

// doing same without timezone:
$age = DateTime::createFromFormat('d/m/Y', '12/02/1973')
     ->diff(new DateTime('now'))
     ->y;
