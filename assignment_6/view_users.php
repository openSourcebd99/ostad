<?php
// Read data from the CSV file
$data = array();
$fp = fopen('users.csv', 'r');
while ($row = fgetcsv($fp)) {
  array_push($data, $row);
}
fclose($fp);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Registered Users</title>
</head>

<body>
  <h2>Registered Users</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Profile Picture</th>
    </tr>
    <?php foreach ($data as $row) { ?>
      <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><img src="uploads/<?php echo $row[2]; ?>" width="100"></td>
      </tr>
    <?php } ?>
  </table>
  <br>
  <a href="index.html">Register a new user</a>
  <br>
  <?php
  // Display welcome message with user's name
  if (isset($_SESSION['name'])) {
    echo "Welcome, " . $_SESSION['name'] . "!";
  } else {
    echo "Welcome, guest!";
  }
  ?>
</body>

</html>