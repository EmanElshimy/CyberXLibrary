<?php
// contact.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Potentially vulnerable to XSS
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Simulate sending an email
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
    } else {
        echo "Thank you, $name. Your message has been sent."; // XSS Vulnerability
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact the Library</h1>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send</button>
    </form>
</body>
</html>
