<?php
define('IS_PAGE', true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parking Manager Admin Board</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      color: #333;
    }

    p {
      color: #666;
    }

    form {
      margin-top: 10px;
    }

    select {
      padding: 5px;
      margin-right: 10px;
    }

    label {
      margin-right: 10px;
    }

    button {
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      font-size: 16px;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <h1>Parking Manager Admin Board</h1>
  <p>Welcome to the admin board for the Parking Manager. Please select an action:</p>

  <?php
  require_once './inc/database.php';

  // Fetch unique cities from the parking_spaces table
  $result = $conn->query("SELECT DISTINCT city FROM parking_spaces");
  ?>

  <form action="process.php" method="get">
    <label for="city">Select City:</label>
    <select id="city" name="city" required>
      <option value="" disabled selected>Choose City</option>
      <?php
      while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['city'] . "'>" . $row['city'] . "</option>";
      }
      ?>
    </select>

    <label>
      <input type="radio" name="action" value="cameras" required> Cameras
    </label>

    <label>
      <input type="radio" name="action" value="stays" required> View Stays
    </label>

    <button type="submit">Submit</button>
  </form>

  <script>
    // Enable/disable the button based on city selection and action
    document.querySelector("button").disabled = true;

    document.querySelector("select").addEventListener("change", function() {
      document.querySelector("button").disabled = this.value === "";
    });

    document.querySelectorAll("input[type='radio']").forEach(function(radio) {
      radio.addEventListener("change", function() {
        document.querySelector("button").disabled = !document.querySelector("select").value || !this.value;
      });
    });
  </script>

  <?php
  // Close the database connection
  $conn->close();
  ?>
</body>

</html>
