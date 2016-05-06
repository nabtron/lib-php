<?php
//weirdly, I found preg_replace to be faster in this example code:
// (however, preg_replace wasn't able to handle a larger string, while str_replace handled much larger one (10+ times larger)

$start = microtime(true); 

echo '<br>';

$url = 'http://offlineclinic.com/somehttp://offlineclinic.com/ssldfkjlaksjdhttp://offlineclinic.com/somehttp://offlineclinic.com/ssldfkjlaksjdhttp://offlineclinic.com/somehttp://offlineclinic.com/ssldfkjlaksjdhttp://offlineclinic.com/somehttp://offlineclinic.com/ssldfkjlaksjdhttp://offlineclinic.com/somehttp://offlineclinic.com/ssldfkjlaksjdhttp://offlineclinic.com/somehttp://offlineclinic.com/ssldfkjlaksjdhttp://offlineclinic.com/somehttp://offlineclinic.com/ssldfkjlaksjdhttp://offlineclinic.com/somehttp://offlineclinic.com/ssldfkjlaksjdhttp://offlineclinic.com/somehttp://offlineclinic.com/ssldfkjlaksjdhttp://offlineclinic.com/
<br>
';

$urlnew = '';

//for($i=0; $i <= 80000; $i++){
for($i=0; $i <= 8000; $i++){
	$urlnew .= $i.$url;
}
//echo $urlnew;

$url = $urlnew;
	
$url = preg_replace('/http\:/', 'https:', $url);
//$url = str_replace('http:', 'https:', $url);

//echo $url;

// code to time 
$end = microtime(true); 
printf("<p>That took %f seconds.</p>\n", $end - $start);
