<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Retrieved Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section id="retrieved-data">
        <h2>Retrieved Data</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check credentials (this is just an example, don't use plain text passwords in production)
            if ($username == 'admin' && $password == 'password') {
                $servername = "localhost";
                $username = "username";
                $password = "password";
                $dbname = "database_name";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT name, email, message FROM messages";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<p>Name: " . $row["name"]. " - Email: " . $row["email"]. " - Message: " . $row["message"]. "</p>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            } else {
                echo "Invalid credentials.";
            }
        }
        ?>
    </section>
</body>
</html>
