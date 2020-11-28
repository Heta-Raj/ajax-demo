<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Example of Making POST Request using Ajax in jQuery</title>
<style>
    label{
        display: block;
        margin-bottom: 10px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        
        // Get action URL
		var actionFile = $(this).attr("action");

        /* Serialize the submitted form control values to be sent to the web server with the request */
        var formValues = $(this).serialize();
        
        // Send the form data using post
        $.post(actionFile, formValues, function(data){
            // Display the returned data in browser
            $("#result").html(data);
        });
    });
});
</script>
</head>
<body>
    <form action="form.php">

        <label>Name: <input type="text" name="name"></label>
        <label>Comment: <textarea cols="50" name="comment"></textarea></label>
        <input type="submit" value="Send">
    </form>
    <div id="result"></div>
</body>
</html>