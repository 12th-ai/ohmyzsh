<?php
session_start();

// Database connection
$con = mysqli_connect("localhost", "root", "", "practice1");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the number of users
$user_query = mysqli_query($con, "SELECT COUNT(*) as user_count FROM users");
$user_result = mysqli_fetch_assoc($user_query);
$user_count = $user_result['user_count'];

// Fetch the number of trades
$trade_query = mysqli_query($con, "SELECT COUNT(*) as trade_count FROM trade");
$trade_result = mysqli_fetch_assoc($trade_query);
$trade_count = $trade_result['trade_count'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    .card {
      display: inline-block;
      padding: 20px;
      margin: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 2px 2px 12px #aaa;
      text-align: center;
      width: 200px;
    }
    .card h2 {
      margin: 0;
      font-size: 2em;
    }
    .card p {
      margin: 5px 0;
      font-size: 1.2em;
    }
  </style>
</head>
<body>
  <main>
    <?php include './Topnav.php'; ?>

    <div class="card">
      <h2><?php echo $user_count; ?></h2>
      <p>Users</p>
    </div>

    <div class="card">
      <h2><?php echo $trade_count; ?></h2>
      <p>Trades</p>
    </div>
  </main>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>
