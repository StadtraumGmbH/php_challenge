<?php
if (!defined('IS_PAGE')) {
    exit('Direct script access denied.');
}

require_once dirname(__FILE__). '/../config.php';

$conn = @new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
