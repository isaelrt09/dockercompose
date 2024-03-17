<!DOCTYPE html>
<html>
<head>
    <title>PHP ISAEL RT App</title>
</head>
<body>
    <p>PHP Docker application.</p>
    <?php
 
    $mysqli = new mysqli(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), getenv('MYSQL_DATABASE'));

 
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    echo "<p>Connected successfully to MySQL/MariaDB database.</p>";

    $result = $mysqli->query("SELECT * FROM example_table");

   
    if ($result->num_rows > 0) {
        echo "<h2>Example Table:</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["column_name"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No rows found in example table.</p>";
    }

    
    $mysqli->close();
    ?>
</body>
</html>