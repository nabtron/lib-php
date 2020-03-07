<?php
// https://stackoverflow.com/a/36803883
if(session_status() == PHP_SESSION_ACTIVE)
{
    session_regenerate_id();
}
