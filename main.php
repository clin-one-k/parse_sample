<html>
<head>
<script 
    type="text/javascript" 
    src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
</script>
<script 
    type="text/javascript" 
    src="http://www.parsecdn.com/js/parse-1.2.12.min.js">
</script>
<script type="text/javascript" src="key.js"></script>
<script>
var currentUser;
$(document).ready(function(){
    Parse.initialize ( APP_ID, JS_KEY );
    currentUser = Parse.User.current();
    console.log( currentUser );
    if ( !currentUser ) {
	    window.location.href = "login.php";
	    return;
	} else {
		var photo = currentUser.get( "photo" );
		//show the photo if avaialbe
		if(typeof(photo) != "undefined" ){
		    var photoUrl = photo.url();
		    if( typeof( photoUrl ) != "undefined" ){
			    insertImage( photoUrl );
		    }
		 }
		//show username
		insertUsername( currentUser.get( "username" ));
		//show phone number
		insertPhone( currentUser.get( "phone" ));
	}
});
function insertImage(url){
    var img = $( '<img id="dynamic">' );
    img.attr({ 'src':url });
    img.appendTo( '#photospan' );
}
function insertUsername( username ){
    $( "#usernamespan" ).text( username );   	
}
function insertPhone( phone ){
	$( "#phonespan" ).text( phone );
}
</script>
</head>
<body>
<h1>Main Page</h1>
<a href="changePhone.php">Edit Phone Number</a> | 
<a href="changePhoto.php">Change Photo</a> | 
<a href="logout.php">Logout</a>
<p>Your Information</p>
<div id="photo">Photo: <span id="photospan"></span></div>
<div id="username">User Name: <span id="usernamespan"></span></div>
<div id="phone">Phone Number: <span id="phonespan"></span></div>
</body>
</html>