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
        //already logged in.
    }
});

function changePhoto(){
   var fileUploadControl = $("#photoFileUpload")[0];
    if (fileUploadControl.files.length > 0) {
        var file = fileUploadControl.files[0];
        var name = "photo.jpg";
        var parseFile = new Parse.File(name, file);
    }
    //first, save to Parse
    parseFile.save().then(
        function() {
            currentUser.set( "photo", parseFile);
            //second, if seccess, associate to user
            currentUser.save( null,{
                success:function( ob ){
                    currentUser.fetch();
                    alert( "new photo saved!" );
                },
                error:function( e ){
                    console.log( "Faile in user save: ",e)
                }
            });

        }, 
        function ( error ) {
            // The file either could not be read, or could not be saved to Parse.
            console.log( "error in parse file save: ");
            console.log( error);
        }
    );
}

</script>    
</head>
<body>
<h1>Add / Edit Photo</h1>
<p><a href="main.php">Main Page</a></p>
<form name="changePhotoForm">
    <br/>New Photo: <input type="file" id="photoFileUpload">
    <button type="button" onClick="changePhoto();">Add / Change Photo</button>
</form>
</body>
</html>