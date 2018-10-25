<?php
require("includes/config.php");

// receives posted data from post.html
if(isset($_POST['myPost'])){
    if($_POST['myPost'] != "") {

        $myPost = $_POST['myPost'];
        //$myPost = strip_tags($myPost);
        //$myPost = htmlspecialchars($myPost);
        $myPost = mysqli_real_escape_string($con, $myPost);
        
        $sql = "INSERT INTO posts VALUES (NULL, '$myPost')";
        $result = mysqli_query($con, $sql);

        if($result){
            echo $myPost;
        } else{
            echo "Error: ".mysqli_error($con);
        }
            
    }else{
        echo "no message";
    }
}
?>



