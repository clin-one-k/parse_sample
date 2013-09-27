<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
<script type="text/javascript" src="key.js"></script>
</head>
<body>
<h1>Add a new user to parse</h1>
<p>https://parse.com/docs/js_guide</p>
<script>
//initial the Key
Parse.initialize ( APP_ID, JS_KEY );

function addUser(name,password,profession){
    var name = document.forms["userForm"]["username"].value;
    var password = document.forms["userForm"]["password"].value;
    var email = document.forms["userForm"]["email"].value;    
    var profession =d ocument.forms["userForm"]["profession"].value;

    //alert(name+" "+password+" "+email+" "+profession); //for debug only

    if( !name || !password || ! profession || !email){
        alert ( "field missing!" );
        return;
    }
    var user = new Parse.User();
    user.set( "username", name );
    user.set( "password", password );
    user.set( "email", email );
    user.set( "profession",profession );
 
    // other fields can be set just like with Parse.Object
    user.set( "phone", "415-392-0202" );
    user.signUp( null, {
      success: function ( user ) {
        // Hooray! Let them use the app now.
        alert ( "success" );
      },
      error: function ( user, error ) {
        // Show the error message somewhere and let the user try again.
        alert ( "Error: " + error.code + " " + error.message );
      }
    });
}
</script>    
<form name="userForm">
    <br/>Username: <input type="text" name="username" id="username">
    <br/>Password: <input type="text" name="password" id="password">
    <br/>Email: <input type="text" name="email" id="email">
    <br/>Profession: <input type="text" name="profession" id="profession">
    <button type="button" onClick="addUser()">Add new user</button>
    </form>
</body>
</html>