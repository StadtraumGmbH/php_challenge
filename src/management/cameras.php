<?php
$servername = "db";
$username = "db_username";
$password = "db_password";
$dbname = "db_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch city name from the GET parameters
$city = $_GET['city'];

// Fetch cameras for the selected city
$camerasQuery = "SELECT * FROM cameras
                 INNER JOIN parking_spaces ON cameras.parking_space_id = parking_spaces.id
                 WHERE parking_space.city = '$city'";
$camerasResult = $conn->query($camerasQuery);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo "Manage City - $city"; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      color: #333;
    }

    /* Add condition to set background color if city is Düsseldorf */
    <?php if ($city == 'Düsseldorf') : ?>h1 {
      background-color: #f2f2f2;
      padding: 10px;
      border-radius: 5px;
    }

    h1::after {
      content: " (Testing Parking)";
      font-size: 14px;
      color: #ff9999;
    }

    <?php endif; ?>table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    table,
    th,
    td {
      border: 1px solid #ddd;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h1>Manage City - <?php echo $city; ?></h1>

  <h2>Cameras</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Directions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($camera = $camerasResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . (string)$camera['id'] . "</td>";
        echo "<td>{$camera['name']}</td>";
        echo "<td>{$camera['position']}</td>";
        echo "<td>{$camera['directions']}</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>

</body>

</html>