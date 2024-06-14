

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <hi>registration form</h1>

    <form method="post">
        <label for="">username</label>
        <input type="text"name="username" placeholdel="username" required><br><br>
        <label for="">password</label>
        <input type="text"name="password" placeholder="password" required><br><br> 
        <button type="submit" name="submit">submit</button>
    </form>
    <?php

    $conn = mysqli_connect("localhost","root","","practice1");



    if(isset($_POST['submit'])){
        $name = $_POST["username"];
        $name = $_POST["password"];

        $checkuser = mysqli_query($conn,"SELECT * FROM shopkeeper WHERE user_name = '$name'");

        if(mysqli_num_rows($checkuser) >0){

            echo 'user already exist';

        }
        else{
            $insert = mysqli_query($conn,"INSERT INTO shopkeeper VALUES (null,'$name','$password')");
          

            if($insert){
                echo "success";
            }

            else{

        echo "failed";

            }
        }
    }
    ?>
</body>
</html>



