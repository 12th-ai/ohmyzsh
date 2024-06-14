<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "practice1");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['logname']; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>

<img src="./dashboard/trade/add_trade.php" alt="">

<form action="" method="POST">
    <h1>add trade  </h1>
        <label for="">name:</label> <br>
        <input type="text" name="name" placeholder="plaese enter your name" id=""> <br>
      <button type="submit" name="submit"> add trade </button>
 

    </form>
</body>
</html>

<?php


$con= mysqli_connect('localhost','root','','trainne_ass_management');



if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $privillage = $_POST['privillage'];
    $password = $_POST['password'];


    $checkuser = mysqli_query($con, "SELECT * FROM users WHERE user_name = '$name' AND `password` = '$password'");

    if(mysqli_num_rows($checkuser) > 0){
        echo '<script>
        alert("user already exist");
          setTimeout(() => {
            window.location.replace("./sign_up.php");
          }, 2000);
        </script>';
    }
    else{
        
         $insert = mysqli_query($con, "INSERT INTO users VALUES (null,'$name','$email','$privillage','$password')");

         if($insert){
            echo '<script>
          alert("inserted successfully");
            setTimeout(() => {
              window.location.replace("./login.php");
            }, 2000);
          </script>';
         }
         else{
     die(mysqli_error($con));
         }
    }
     

}


?>




<!-- login page    -->

<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/app.css">
    <title>Document</title>
</head>
<body>

    <form action="" method="POST" id='login_form' > 
    <h1>sign up </h1>
    <label for="">name:</label> <br>
        <input type="text" name="name" placeholder="plaese enter your name" id=""> <br>
       
        <label for="">password:</label> <br>
        <input type="password" name="password" placeholder="plaese enter your password" id=""> <br>
       
      <button type="submit" name="login"> login </button>
      <p>don't you have account <a href="./sign_up.php">sign up</a></p>
    </form>
</body>
</html>

<?php


$con= mysqli_connect('localhost','root','','trainne_ass_management');


if(isset($_POST['login'])){

    $name = $_POST['name'];
 
    $password = $_POST['password'];


    $checkuser = mysqli_query($con, "SELECT * FROM users WHERE user_name = '$name' AND `password` = '$password'");

    if(mysqli_num_rows($checkuser) > 0){

        $fetchUser = mysqli_fetch_array($checkuser);
     
        $_SESSION['userLog'] = $fetchUser['user_id'];
        $_SESSION['userLogpassword']= $fetchUser['password'];
        $_SESSION['userLogName'] = $fetchUser['user_name'];
        $_SESSION['userLogLvl'] = $fetchUser['privilege'];

        echo '<script>
        alert("login successfully");
          setTimeout(() => {
            window.location.replace("./dashboard.php");
          }, 2000);
        </script>';
    }
    else{
        echo '<script>
        alert("login failed");
          setTimeout(() => {
            window.location.replace("./login.php");
          }, 2000);
        </script>';
    }
}


?>



<!-- sign up  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/app.css">
    <title>Document</title>
</head>
<body>


    <form action="" method="POST">
    <h1>create account  </h1>
        <label for="">name:</label> <br>
        <input type="text" name="name" placeholder="plaese enter your name" id=""> <br>
        <label for="">email:</label> <br>
        <input type="email" name="email" placeholder="plaese enter your email" id=""> <br>
        <label for="">password:</label> <br>
        <input type="password" name="password" placeholder="plaese enter your password" id=""> <br>
        <label for="">privillage:</label> <br>
      <select name="privillage" id="">
        <option value="0">manager</option>
        <option value="1">secretary</option>
        <option value="2`">student</option>
        <option value="3">teacher</option>
      </select> <br>

      <button type="submit" name="submit"> sign up </button>
      <p>do you have account <a href="./login.php">login</a></p>

    </form>
</body>
</html>

<?php


$con= mysqli_connect('localhost','root','','trainne_ass_management');



if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $privillage = $_POST['privillage'];
    $password = $_POST['password'];


    $checkuser = mysqli_query($con, "SELECT * FROM users WHERE user_name = '$name' AND `password` = '$password'");

    if(mysqli_num_rows($checkuser) > 0){
        echo '<script>
        alert("user already exist");
          setTimeout(() => {
            window.location.replace("./sign_up.php");
          }, 2000);
        </script>';
    }
    else{
        
         $insert = mysqli_query($con, "INSERT INTO users VALUES (null,'$name','$email','$privillage','$password')");

         if($insert){
            echo '<script>
          alert("inserted successfully");
            setTimeout(() => {
              window.location.replace("./login.php");
            }, 2000);
          </script>';
         }
         else{
     die(mysqli_error($con));
         }
    }
     

}


?>




<?php 
  session_start();
  // $con = mysqli_connect('localhost', 'root', '', 'stock_management');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/app.css">
 
    <title>Document</title>


</head>
<body>

            <form action="" method="POST" id="login_form">
    <h1>add trade  </h1>
        <label for="">name:</label> <br>
        <input type="text" name="name" placeholder="plaese enter your name" id=""> <br>
      <button type="submit" name="submit"> add trade </button>
 

    </form>
          
     
       
     


</body>
</html>

<?php 
$con= mysqli_connect('localhost','root','','trainne_ass_management');



if(isset($_POST['submit'])){

    $name = $_POST['name'];
  


    $checkuser = mysqli_query($con, "SELECT * FROM trade WHERE trade_name = '$name'");

    if(mysqli_num_rows($checkuser) > 0){
        echo '<script>
        alert("trade already exist");
          setTimeout(() => {
            window.location.replace("./add_trade.php");
          }, 2000);
        </script>';
    }
    else{
        
         $insert = mysqli_query($con, "INSERT INTO trade VALUES (null,'$name')");

         if($insert){
            echo '<script>
          alert(" trade inserted successfully");
            setTimeout(() => {
              window.location.replace("trade.php");
            }, 2000);
          </script>';
         }
         else{
     die(mysqli_error($con));
         }
    }
     

}


?>




<?php 
  session_start();
  // $con = mysqli_connect('localhost', 'root', '', 'stock_management');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/app.css">
    <title>Document</title>


</head>
<body>
    <div class="main-dash">

        <div class="left-side">
                <div class="logo">
                     <h1>lavinia</h1>
                     <p>school management</p>
                 </div>
            <div class="routers">
                <a href="">home</a>
                <a href="">trades</a>
                <a href="">trainnes</a>
                <a href="">modules</a>
                <a href="">marks</a>
            </div>
               <div class="logout">
                 <p><a href="./logout.php">logout</a></p>
  
                </div>
        </div>


        <div class="right-side">
    
            <div class="top-nav">
                <?php include './topnav.php' ?>
             
            </div>

          
     
        </div>
     
</div>

</body>



<?php 
  session_start();
  // $con = mysqli_connect('localhost', 'root', '', 'stock_management');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/app.css">
    <title>Document</title>


</head>
<body>
    <div class="main-dash">

        <div class="left-side">
                <div class="logo">
                     <h1>lavinia</h1>
                     <p>school management</p>
                 </div>
            <div class="routers">
                <a href="">home</a>
                <a href="">trades</a>
                <a href="">trainnes</a>
                <a href="">modules</a>
                <a href="">marks</a>
            </div>
               <div class="logout">
                 <p><a href="./logout.php">logout</a></p>
  
                </div>
        </div>


        <div class="right-side">
    
            <div class="top-nav">
                <?php include './topnav.php' ?>
             
            </div>

            <div class="main-table">
                <div class="title">
                <a href="./add_trade.php">add trade</a>
           <h1>trade </h1>
                </div>
            
            <table >
                <thead>
                    <th>trade id</th>
                    <th>trade name</th>
                    <th>action</th>
                </thead>
                <tbody>
                    <tr >
                        <td  style="width:120px">1</td>
                        <td  style="width:220px">2</td>
                        <td style="display:flex;width:220px;padding:10px">
                             <a href="">update</a>
                            <a href="delete">delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>

          
     
        </div>
     
</div>

</body>
</html>


<?php

    session_destroy();
    echo '<script>
    alert("you are logged out ");
      setTimeout(() => {
        window.location.replace("./login.php ");
      }, 2000);
    </script>';
  

?>
<?php
$con= mysqli_connect('localhost','root','','trainne_ass_management');


?>


<?php
 // Setting Title of the logged in user based on their user level
 $sessionLvl = $_SESSION['userLogprivillage'];
 if($sessionLvl == 1) {
   $title = 'Receptionist';
 } else if($sessionLvl == 2) {
   $title = 'Buyer';
 } else if($sessionLvl == 3) {
   $title = 'Acc. Payable Off.';
 } else {
   $title = 'Admin';
 }
 
?>

<?php 
    if(!isset($_SESSION['userLogName'])) {
      echo '<script>
        Swal.fire({
          title: "Unauthorized Access!",
          text: "Please Login First!, Logging Out...",
          icon: "error",
        })
        setTimeout(() => {
          window.location.replace("../index.php");
        }, 3000);
      </script>';
      return 0;
    }
  ?>


    <h1>lavinia</h1>


  Welcome, <?php echo $title ?> <?php echo $_SESSION['userLogName'] ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <h1> register </h1>

        <label for="">user name </label> <br>
        <input type="text" name="user_name" id=""> <br>
        <label for="">user email</label> <br>
        <input type="email" name="user_email" id=""> <br>
    <label for="">privillage</label> <br>
    <select name="privillage" id="">
        <option value="o">admin</option>
        <option value="1">secretary</option>
    </select> <br>
    <label for="">password</label> <br>
    <input type="password" name="password" id=""> <br>
    <input type="submit" name="submit" id="">
    <button type="submit" name="submit"> add user  </button>
    </form>
</body>
</html>

<?php
$con= mysqli_connect('localhost','root','','authentication');



if(isset($_POST['submit'])){

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $privillage = $_POST['privillage'];
    $password = $_POST['password'];


    $checkuser = mysqli_query($con, "SELECT * FROM users WHERE user_name = '$user_name' AND `user_password` = '$password'");


    if(mysqli_num_rows($checkuser) > 0){
        echo '<script>
        alert("user already exist");
          setTimeout(() => {
            window.location.replace("./sign_up.php");
          }, 2000);
        </script>';
    }
    else{
        
         $insert = mysqli_query($con, "INSERT INTO users VALUES (null,'$user_name','$user_email','$privillage','$password')");

         if($insert){
            echo '<script>
          alert("inserted successfully");
            setTimeout(() => {
              window.location.replace("./login.php");
            }, 2000);
          </script>';
         }  
         else{
     die(mysqli_error($con));
         }
    }

}


?>

<?php
session_start();

// Database connection
$con = mysqli_connect("localhost", "root", "", "practice1");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['delete'])) {
    $trade_id = $_GET['delete'];
    $delete_trade = mysqli_query($con, "DELETE FROM trade WHERE trade_id = $trade_id");

    if ($delete_trade) {
        echo '<script>alert("Trade deleted successfully");</script>';
    } else {
        echo '<script>alert("Failed to delete trade");</script>';
    }
}

// Search trade logic
$search_query = "";
if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
}

// Fetch trades
$trades = mysqli_query($con, "SELECT * FROM trade WHERE trade_name LIKE '%$search_query%'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade Management</title>
</head>
<body>

    <h1>Search Trade</h1>
    <form action="" method="post">
        <label for="search_query">Search by Trade Name</label> <br>
        <input type="text" name="search_query" id="search_query" value="<?php echo htmlspecialchars($search_query); ?>"><br>
        <button type="submit" name="search">Search</button>
    </form>

    <h1>Trade List</h1>
    <a href="add_trade.php">Add New Trade</a>
    <table border="1">
        <tr>
            <th>ID</th> 
            <th>Trade Name</th>
            <th>Actions</th>
        </tr>
        <?php
        if (mysqli_num_rows($trades) > 0) {
            while ($row = mysqli_fetch_assoc($trades)) {
                echo "<tr>";
                echo "<td>" . $row['trade_id'] . "</td>";
                echo "<td>" . $row['trade_name'] . "</td>";
                echo "<td>";
                echo "<a href='update_trade.php?id=" . $row['trade_id'] . "'>Edit</a> | ";
                echo "<a href='index.php?delete=" . $row['trade_id'] . "' onclick='return confirm(\"Are you sure you want to delete this trade?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No trades found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>registaration form </h1>
    <form method="post">
        <label for="">user name</label> <br>
        <input type="text" name="user_name" id="" placeholder="enter your user name"> <br>
        <label for="">password</label> <br>
        <input type="password" name="password" id="" placeholder="********"> <br>
        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html>

<?php

$conn = mysqli_connect("localhost","root","","practice1");


if(isset($_POST['submit'])){

    $name = $_POST['user_name'];
    $password = $_POST['password'];

    $select = mysqli_query($conn,"SELECT * FROM users WHERE user_name = '$name'");

    if(mysqli_num_rows($select)>0){

        echo '<script>alert("user already exist")</script>';
        
    }
    else{
        $insert = mysqli_query($conn,"INSERT INTO users VALUES(null,'$name','$password')");

        if($insert){
            echo '<script>alert("user inserted sucessfully");
            
            setTimeout(()=>{

                window.location.replace("./login.php");
            })
            </script>';
 
        }
        else{
            die(mysqli_error($conn));
        }
    }
}


?>
