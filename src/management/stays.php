<?php
define('IS_PAGE', true);

require_once '../inc/database.php';
require_once '../inc/custom_style.php';

// Fetch city name from the GET parameters
if(!isset($_GET['city'])) {
    die("Missing city parameter.");
}

$city = $_GET['city'];
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Fetch cameras for the selected city
$stmt = $conn->prepare("SELECT r_entry.plate,
           c_entry.name AS entry_gate,
           c_exit.name AS exit_gate
    FROM stays s
    JOIN recognitions r_entry ON s.entry_recognition_id = r_entry.id
    JOIN cameras c_entry ON r_entry.camera_id = c_entry.id
    LEFT JOIN recognitions r_exit ON s.exit_recognition_id = r_exit.id
    LEFT JOIN cameras c_exit ON r_exit.camera_id = c_exit.id
    JOIN parking_spaces p ON s.parking_space_id = p.id
    WHERE p.city = ?");
$stmt->bind_param('s', $city);
$stmt->execute();
$staysResult = $stmt->get_result();

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

  <h2>Stays</h2>
  <table>
    <thead>
      <tr>
        <th>Plate number</th>
        <th>Entry Gate</th>
        <th>Exit Gate</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($stay = $staysResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$stay['plate']}</td>";
        echo "<td>{$stay['entry_gate']}</td>";
        echo "<td>{$stay['exit_gate']}</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>

</body>

</html>
