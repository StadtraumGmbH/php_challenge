<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  // Check if both city and action are set
  if (isset($_GET["city"]) && isset($_GET["action"])) {
    $city = $_GET["city"];
    $action = $_GET["action"];

    // Redirect based on the selected action
    switch ($action) {
      case "cameras":
        header("HTTP/1.1 303 See Other");
        header("Location: management/cameras.php?city=$city");
        break;
      case "stays":
        header("HTTP/1.1 303 See Other");
        header("Location: management/stays.php?city=$city");
        break;
      default:
        // Invalid action, redirect to index.php
        header("HTTP/1.1 303 See Other");
        header("Location: index.php");
    }
    exit();
  }
}

// Redirect to index.php if something goes wrong
header("HTTP/1.1 303 See Other");
header("Location: index.php");
exit();
