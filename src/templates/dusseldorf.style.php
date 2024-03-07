<?php
if (!defined('IS_PAGE')) {
    exit('Direct script access denied.');
}
?>
h1 {
background-color: #f2f2f2;
padding: 10px;
border-radius: 5px;
}

h1::after {
content: " (Testing Parking)";
font-size: 14px;
color: #ff9999;
}
