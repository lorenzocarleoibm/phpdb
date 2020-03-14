<?php
$dbhost = getenv("MARIADB_SERVICE_HOST");
$dbport = getenv("MARIADB_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");

$mysqli = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database\n");
    
    $query = "SELECT * FROM pages";
    if ($result = $mysqli->query($query)) {
 
        while ($row = $result->fetch_assoc()) {
            $code = $row["code"];
            $employee = $row["employee"];
 
            echo '<b>'.$code.$employee.'</b><br />';
        }
    }
}   
$mysqli->close();
?>
