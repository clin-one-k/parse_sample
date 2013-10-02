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
        if (!currentUser) {
            window.location.href="login.php";
            return;
        } else {
            //user already logged in
        }
    });

function changePhone(){
    var phone = document.forms["changePhoneForm"]["phone"].value;
    if( !phone){
        alert( "Please enter a phone number." );
        return;
    }
    currentUser.set( "phone", phone);
    currentUser.save( null, {
        success: function(){
            alert( "new phone saved!" );
            currentUser.fetch(); //reflesh the data
        },
        error: function(e){
            alert( "save failed", e);
        }
    });
}
</script>
</head>
<body>
<h1>Add / Edit phone number</h1>
<p><a href="main.php">Main Page</a></p> 
<form name="changePhoneForm">
    <br/>New PhoneNumber: <input type="text" name="phone" id="phone">
    <button type="button" onClick="changePhone();">Update phone number</button>
</form>
</body>
</html>