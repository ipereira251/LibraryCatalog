<?php
// Start the session (if not already started)
session_start();

// Destroy the session
session_destroy();

// Redirect to login page or desired location
header("Location: index.html");

// Exit script to avoid further execution
exit;
?>