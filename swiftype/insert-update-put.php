<?php

/*

for put (update) method, if we use put in curl, or any other thing, it results in error on swiftype api: 
{"error":"Routing Error. The path you have requested is invalid."}

solution is to use: curl_setopt($channel, CURLOPT_CUSTOMREQUEST, "PUT");

reference: https://www.davidbritch.com/2014/08/test-post.html

not checked if it works without it too, directly by: https://coderwall.com/p/jtiu4q/sending-put-data-through-php-curl
as davidbritch said that it won't work without data in external file with normal put method of curl

*/
