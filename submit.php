<?php
// Include DB connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "<script>alert('Thank you! Message sent successfully.'); window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Error saving message.'); window.history.back();</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
    }

    $conn->close();
}
?>