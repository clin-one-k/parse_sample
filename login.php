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
</head>

<script>
$(document).ready(function(){
    Parse.initialize ( APP_ID, JS_KEY );
    var currentUser = Parse.User.current();
    if (currentUser) {
		window.location.href="main.php";
		return;
	} else {
        //use not login yet
	}
});

function userLogin(){
	var name = document.forms["loginForm"]["username"].value;
    var password = document.forms["loginForm"]["password"].value;
    Parse.User.logIn(name,password, {
    	success: function(user){
            window.location.href="main.php";
    	},
    	error: function (user, error){
    		alert("login failed. See console log.");
    		console.log("Error: ", error);
    	}
    });
}
</script>
<body>
<h1>Login Page</h1>
<form name="loginForm">
    <br/>Username: <input type="text" name="username" id="username">
    <br/>Password: <input type="password" name="password" id="password">
    <br/><button type="button" onClick="userLogin();">Login</button>
</form>
<p>Example: SanDiego, sman, smith, chenchen cc; password is "chen".</p>
</body>
</html>