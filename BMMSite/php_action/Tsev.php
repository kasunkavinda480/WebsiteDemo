
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webdatabase";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM product";  //This is where I specify what data to query
    $result = $conn->query($sql);
    echo json_encode($result);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>