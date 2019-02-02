<?php
if( isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']) ) {

	//your site secret key
	$secret = '';
	//get verify response data
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
	$responseData = json_decode($verifyResponse);
	if($responseData->success) {
	
		// your successful form submission related code here
	
	}
}
?>

<script src="https://www.google.com/recaptcha/api.js?render=<site-key>"></script>
<script>
  grecaptcha.ready(function() {
   grecaptcha.execute("<site-key>", {action: "anythinghere"})
   .then(function(token) {
    console.log(token)
    document.getElementById("g-recaptcha-response").value = token;
   }); 
  }); 
 </script>

<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" value="">
