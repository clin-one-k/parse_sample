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
$(document).ready(function(){
    Parse.initialize ( APP_ID, JS_KEY );
    Parse.User.logOut();
    var currentUser = Parse.User.current();
    console.log("Current User is: ", currentUser);
});
</script>
</head>
<body>
<h1>Logout Page</h1>
<p>You are now logged out.</p>
<p>Go to <a href="login.php">Login Page</a></p>
</body>
</html>