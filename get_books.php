<?php
// get_books.php

try {
    $db = new PDO('sqlite:library.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vulnerable to SQL Injection through $_GET['search']
    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
        // Not using prepared statements, making it vulnerable
        $stmt = $db->query("SELECT * FROM books WHERE title LIKE '%$searchTerm%' OR author LIKE '%$searchTerm%'");
    } else {
        $stmt = $db->query("SELECT * FROM books");
    }

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($books);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
