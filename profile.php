<?php
// profile.php

session_start();

// Simulate user data if not already set
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = ['name' => 'Amira'];
}

function handleError($error) {
    echo "Error: " . htmlspecialchars($error); // Potentially displays sensitive information
}

try {
    if (!isset($_SESSION['user'])) {
        throw new Exception("User not logged in.");
    }
    $user = $_SESSION['user'];
    echo "<h1>Profile of " . htmlspecialchars($user['name']) . "</h1>";
} catch (Exception $e) {
    handleError($e->getMessage());
}
?>
