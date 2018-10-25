<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

//includ the class to capture errors;
include("Headache.php");

//declare variables
$err_arr = array();
$firstname = "";
$lastname = "";

function setValue($value){
    if(isset($_POST['$value'])) echo $_POST['$value'];
}

if(isset($_POST["register_button"])){
    $firstname = sanitizeName($_POST['firstname']);
    $lastname = sanitizeName($_POST['lastname']);
    $email = $_POST['email'];
    $email2 = $_POST['email2'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(strlen($firstname) <2 || strlen($firstname) > 10){
        $err_arr[] = Headache::$firstnameCharError;
    }
}

function sanitizeName($name){
    $name = strip_tags($name);
    $name = str_replace(" ", "", $name);
    $name = ucfirst(strtolower($name));
    return $name;
}
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
    

    <div id="registerForm">
            <form action="register.php" id="register" method="POST">
                <input type="text" name="firstname" id="firstname" placeholder="Voornaam" value="<?php setValue('firstname');?>" required>
                <input type="text" name="lastname" id="lastname" placeholder="Achternaam" value="<?php setValue('lastname');?>" required>
                <input type="email" name="email" id="email" placeholder="you@example.com" value="<?php setValue('email');?>" required>
                <input type="email" name="email2" id="email2" placeholder="you@example.com" value="<?php setValue('email2');?>" required>
                <input type="password" name="password" id="password" placeholder="wachtwoord">
                <input type="password" name="password2" id="password2" placeholder="bevestig wachtwoord">
                <input type="submit" name="register_button" value="Aanmelden"><br>
            </form>
        </div> <!--registerForm--> 


<?php echo $firstname. "<br>"?> 
<?php echo $lastname. "<br>"?> 
<?php 
    if(in_array(Headache::$firstnameCharError, $err_arr)) 
        echo Headache::$firstnameCharError;
?>


</body>
</html>