<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "practice1");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize search variable
$search = "";
if (isset($_POST['search_query'])) {
    $search = $_POST['search_query'];
}

// Fetch trades
$select = mysqli_query($con, "SELECT * FROM trade WHERE trade_id LIKE '%$search%' or trade_name like '%$search%'");

if(isset($_GET['id'])){
    $id = $_GET['id'];

   $delete = mysqli_query($con,"DELETE FROM trade where trade_id = '$id'");
}
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
        <label for="search_query">Search by Trade Code or Trade Name</label> <br>
        <input type="text" name="search_query" id="search_query" value="<?php echo htmlspecialchars($search); ?>"><br>
        <button type="submit" name="search">Search</button>
    </form>

    <h1>Trade List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Trade ID</th>
                <th>Trade Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($select) > 0) {
                while ($row = mysqli_fetch_assoc($select)) {
                    $trade_id = $row['trade_id'];
                    $trade_name = $row['trade_name'];
            ?>
            <tr>
                <td><?php echo $trade_id; ?></td>
                <td><?php echo $trade_name; ?></td>
                <td>
                    <a href="./updatetrade.php?id=<?php echo $trade_id; ?>">Update</a>
                    <a href="./addtrade.php?id=<?php echo $trade_id; ?>" onclick="return confirm('Are you sure you want to delete this trade?');">Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='3'>No trades found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>
