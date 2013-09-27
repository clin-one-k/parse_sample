<?php
// for debug
ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
error_reporting ( -1 );

// key setup
include( "key.php" );
$appId = APP_ID ;
$RESTkey=REST_KEY;
// error message
$error_message = "";

// prepare for command-line URL tool
$curl = curl_init ( "https://api.parse.com/1/users" );
curl_setopt ( $curl, CURLOPT_HEADER, true );
curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, true );
curl_setopt ( $curl, CURLOPT_HTTPHEADER, array (
    "X-Parse-Application-Id: ".$appId,
    "X-Parse-REST-API-Key: ".$RESTkey
    )
);

// run crul
$response = curl_exec ( $curl );
$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ( !$response && $statusCode !== 200 ) {
     $response = curl_error ( $curl );
     curl_close ( $curl );
     $error_message="curl failed.";
} else {
    list( $header, $body ) = explode ( "\r\n\r\n", $response, 2 );
    $_response = $body;
    $_results = null;
    $decoded = json_decode ( $body );
}
curl_close ( $curl );

//only take the "result"
$decoded = $decoded->results;

?>
<h1>Get all usrs</h1>
<p>Use REST for PHP to retrieve all the user from parse. 
    https://parse.com/docs/rest#users
 </p>
<table border>
<tr><th>username</th><th>profession</th></tr>
<?php foreach ($decoded as $r):?>
    <tr><td><?php echo $r->username?></td><td><?php echo $r->profession?></td></tr>
<?php endforeach;?>
</table>
<?php echo $error_message;?>