<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        .container {
            padding: 20px;
            align-items: center;
            text-align: center;
        }
        h2 {
            color: green;
            text-decoration: underline;
        }
        .output-box {
            border: 2px solid black;
            padding: 15px;
            margin-top: 20px;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            background-color: #f8f9fa;
            text-align: left;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Validation</h2>
        <form method="POST">
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email: </label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="message">Message: </label><br>
            <textarea id="message" name="message" rows="4" cols="30" required></textarea><br><br>

            <input type="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get and sanitize inputs
            $name = htmlspecialchars(trim($_POST['name']));
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $message = htmlspecialchars(trim($_POST['message']));

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p style='color: red;'>Invalid email format.</p>";
            } else {
                // Display the output in a box
                echo "<div class='output-box'>";
                echo "<h3>Output:</h3>";
                echo "<strong>Name:</strong> $name <br>";
                echo "<strong>Email:</strong> $email <br>";
                echo "<strong>Message:</strong> $message";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>

