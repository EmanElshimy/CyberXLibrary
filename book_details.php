<?php
// book_details.php

if (isset($_GET['id'])) {
    $bookId = intval($_GET['id']);

    try {
        $db = new PDO('sqlite:library.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // XSS vulnerability: book data is not properly sanitized
        $stmt = $db->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$bookId]);
        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($book) {
            echo "<h1>" . $book['title'] . "</h1>"; // XSS Vulnerability
            echo "<p><strong>Author:</strong> " . $book['author'] . "</p>";
            echo "<p><strong>Description:</strong> " . $book['description'] . "</p>";
        } else {
            echo "Book not found.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No book ID specified.";
}
?>
