<?php
//UX - file upload example
//fileUpload.php
//uploads an image to the folder given in $folder
//stores the file name in the database
//queries the database and output the image in a container
//NOTE: insert password
//NOTE: change write permissions for this specific folder (root folder permissions need not be changed)

    $con = mysqli_connect("localhost", "root", "C1RT4Nmysql", "upload") or die("Cannot connect");

    if(isset($_POST['btn-upload'])) {

        $file = $_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $folder = "assets/profile_pic/";

        //loads the file into the folder
        move_uploaded_file($file_loc, $folder.$file);

        //insert the file name and type and size into the database
        mysqli_query($con, "INSERT INTO myFiles VALUES(NULL, '$file', '$file_type', '$file_size')");
    }
    
    //retrieves the sfile name of the same image
    $query = mysqli_query($con, "SELECT * FROM myFiles WHERE file='$file' ");
    $row = mysqli_fetch_array($query);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="fileUpload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <input type="file" name="file" >
    <button type="submit" name="btn-upload">upload file</button>
    </form>

<!-- loads the image uploaded with file path and file name -->
<img src="<?php echo $folder.$row['file'];?>" >

</body>
</html>