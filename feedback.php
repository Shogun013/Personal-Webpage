<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location:index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $hostname = "localhost"; 
    $dbUser = "id21974227_llorenz";
    $dbPassword = "2310050598Lor#";
    $dbName = "id21974227_personal_db";

    $conn = new mysqli($hostname, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO feedback (name, email, phone, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    if ($stmt->execute()) {
        echo '<div style="text-align: center;">Feedback submitted successfully!</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <title>Feedback</title>
    <link rel="stylesheet" href="style3.css">
</head>
<a href="index.php" onclick="history.back();" class="btn btn-secondary back-button">
    <i data-feather="arrow-left">Back</i>
</a>
<body>
    <div class="container">
    <form action="feedback.php"  method="post" id="contactForm">
    <h3>GET IN TOUCH</h3>
    <input type="text" name="name" id="name" placeholder="Your Name" required>
    <input type="email" name="email" id="email" placeholder="Email id" required>
    <input type="text" name="phone" id="phone" placeholder="Phone no." required>
    <textarea name="message" id="message" rows="4" placeholder="How can we help you?"></textarea>
    <button type="submit">Send</button>
</form>
    <div>
</body>
</html>

