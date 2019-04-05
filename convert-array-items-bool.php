<?php

/*
Imagine that you're receiving an array of 'group' inside $_POST and they have true false or 0 1 values, however http converts them to string when they are sent over to your server. 
This code will convert that array values back to php bool
*/

$group = $_POST['group'];

foreach ( $group as &$group_el ) {
    $group_el = (bool)$group_el;
}
