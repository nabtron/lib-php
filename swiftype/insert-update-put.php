<?php

/*

solves the issue of curl working in terminal but not in php (for put)
get the output of terminal curl by using -v in first line and then see method to be put for example

for put (update) method, if we use put in curl, or any other thing, it results in error on swiftype api: 
{"error":"Routing Error. The path you have requested is invalid."}

solution is to use: curl_setopt($channel, CURLOPT_CUSTOMREQUEST, "PUT");

reference: https://www.davidbritch.com/2014/08/test-post.html

not checked if it works without it too, directly by: https://coderwall.com/p/jtiu4q/sending-put-data-through-php-curl
as davidbritch said that it won't work without data in external file with normal put method of curl

*/


function nabtron_curl_1(){
    // working fine to update the data, CURLOPT_CUSTOMREQUEST is important, ref: https://www.davidbritch.com/2014/08/test-post.html
    ///api/v1/engines/{engine_id}/document_types/{document_type_id}/documents/{document_id}/update_fields.json
    $url = 'https://api.swiftype.com/api/v1/engines/vsa-dev-/document_types/posts/documents/6767671/update_fields.json';
    echo $url;
    $data_json = '{
        "auth_token": "api-key",
        "fields": {"title": "my title 21", "custom_field": "user2"}
    }';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);

    print_r($response);
    curl_close($ch);
    die();
}

function nabtron_curl_2(){
    // working, either updates existing with specific fields only or creates new
    $url = 'https://api.swiftype.com/api/v1/engines/vsa-dev-/document_types/posts/documents/create_or_update.json';
    $data_json = '{
        "auth_token": "api-key",
        "document": {
          "external_id": "6767671",
          "fields": [
              {"name": "title", "value": "nabtron 6767671", "type": "string"},
              {"name": "custom_field", "value": "posts", "type": "enum"}
          ]}
      }';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    $response  = curl_exec($ch);

    print_r($response);
    curl_close($ch);
    die();
}

//nabtron_curl_1();
// nabtron_curl_1();
/*
curl -X POST 'https://api.swiftype.com/api/v1/engines/bookstore/document_types/books/documents/create_or_update.json' \
-H 'Content-Type: application/json' \
-d '{
      "auth_token": "YOUR_API_KEY",
      "document": {
        "external_id": "2",
        "fields": [
            {"name": "title", "value": "my new title", "type": "string"},
            {"name": "page_type", "value": "user", "type": "enum"}
        ]}
      }'


curl -X POST 'https://vsa-dev-2019.api.swiftype.com/api/as/v1/engines/VSA-DEV-/schema' \
-H 'Content-Type: application/json' \
-H 'Authorization: Bearer private-xxxxxxxxxxxxxxxx' \
-d '{
  "square_mi": "number"
}
'

// works perfect on terminal to update the existing keys (doesn't add new keys)
// example: https://app.swiftype.com/engines/vsa-dev-/document_types/posts/documents/6767671

curl -X PUT 'https://api.swiftype.com/api/v1/engines/vsa-dev-/document_types/posts/documents/6767671/update_fields' -v \
-H 'Content-Type: application/json' \
-d '{
      "auth_token": "api-key",
      "fields": {"title": "my title 2", "custom_field": "user3"}
    }'
    
*/
