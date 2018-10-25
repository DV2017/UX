<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../js/jquery-3.2.1.js"></script>
</head>
<body>
    

<form action="post.php">
    <textarea name="post_text" id="post_text" cols="30" rows="25"></textarea>
    <input type="button" id="post_button" value="POST">
</form>

<textarea name="post_area" id="post_area" cols="30" rows="5"></textarea>
<h3 id="message"></h3>


<script>
    var myPost;

    $("#post_button").click(function(e){
        e.preventDefault();

        myPost = $("#post_text").val();
        console.log(myPost);

        

        $.post("post-ajax.php", {myPost : myPost}, function(data){
            $("#post_area").html(myPost);
            $("#message").html(data);
        });
    })
</script>
</body>
</html>