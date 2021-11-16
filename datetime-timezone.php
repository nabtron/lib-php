<?php

$date = DateTime::createFromFormat('d/m/Y', $date);
$date->setTimeZone(new DateTimeZone('America/New_York'));
$date = $date->format('Y-m-d');
