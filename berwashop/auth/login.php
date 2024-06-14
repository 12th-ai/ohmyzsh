<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login form</h1>
    <form method="post">


     <label for="">user name</label> <br>
     <input type="text" name="user_name" id="" placeholder="user name" required > <br>
     <label for="">password</label>
     <input type="password" name="password" placeholder="*******" id="" required> <br>
     <button name="submit" type="submit">submit</button>
    </form>
</body>
</html>

<?php

$conn = mysqli_connect("localhost","root","","practice1");

if(isset($_POST['submit'])){

$name = $_POST['user_name'];
$password = $_POST['password'];

$checkuser = mysqli_query($conn,"SELECT * FROM shopkeeper WHERE user_name = '$name' AND password = '$password'");

if(mysqli_num_rows($checkuser)> 0){

    echo '<script>alert("login successfully")</script>';
}
else{
    echo '<script>alert("login failed")</script>';
}

}

?>


