<?php
define('IS_PAGE', true);

require_once '../inc/database.php';
require_once '../inc/custom_style.php';

// Fetch city name from the GET parameters
if(!isset($_GET['city'])) {
    die("Missing city parameter.");
}

$city = $_GET['city'];

// Fetch cameras for the selected city
$stmt = $conn->prepare("SELECT * FROM cameras
                 INNER JOIN parking_spaces ON cameras.parking_space_id = parking_spaces.id
                 WHERE parking_spaces.city = ?");
$stmt->bind_param('s', $city);
$stmt->execute();
$camerasResult = $stmt->get_result();

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
    <?php get_custom_style_content_for_city($city) ?>
    table {
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
        echo "<td>{$camera['id']}</td>";
        echo "<td>{$camera['name']}</td>";
        echo "<td>{$camera['position']}</td>";
        echo "<td>{$camera['direction']}</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>

</body>

</html>
