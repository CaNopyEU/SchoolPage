<?php
session_start();// Zapneme session
session_destroy();// Zmažeme všetky session
header("location: index.php"); // Přsesmeruje na přihlašovací stránku
?>
