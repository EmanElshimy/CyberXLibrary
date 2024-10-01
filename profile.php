<?php
session_start();

function handleError($error) {
    echo "Error: " . htmlspecialchars($error);
}

try {
    // Simulate user profile retrieval
    if (!isset($_SESSION['user'])) {
        throw new Exception("User not logged in.");
    }
    $user = $_SESSION['user'];
    echo "<h1>Profile of " . htmlspecialchars($user['name']) . "</h1>";
} catch (Exception $e) {
    handleError($e->getMessage());
}
?>
