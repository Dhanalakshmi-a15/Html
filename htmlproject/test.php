<?php
if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo "MySQLi is not installed!";
} else {
    echo "MySQLi is installed!";
}
?>