<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "my_database");

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vulnerable SQL query with no input validation (for educational purposes only)
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<p>Login successful!</p>";
    } else {
        echo "<p>Login failed.</p>";
    }

    mysqli_close($conn);
}
?>
