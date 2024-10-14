<?php
try {
    $db = new PDO('sqlite:library.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the books table
    $db->exec("CREATE TABLE IF NOT EXISTS books (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        author TEXT NOT NULL,
        description TEXT NOT NULL
    )");

    // Insert sample data
    $db->exec("INSERT INTO books (title, author, description) VALUES 
        ('The Great Gatsby', 'F. Scott Fitzgerald', 'A novel about the American dream.'),
        ('1984', 'George Orwell', 'A dystopian novel about totalitarianism.'),
        ('To Kill a Mockingbird', 'Harper Lee', 'A novel about racial injustice.'),
        ('Moby-Dick', 'Herman Melville', 'A novel about the voyage of the whaling ship Pequod.'),
        ('War and Peace', 'Leo Tolstoy', 'A historical novel set during the Napoleonic Wars.')
    ");

    echo "Books table created and sample data inserted successfully.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
