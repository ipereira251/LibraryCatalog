<?php
// Function to create a sql connection.
function getDB() {
  $dbhost="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="library";

  // Create a DB connection
  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($conn->connect_error) {
    echo "No DB connection.";
    die("Connection failed: " . $conn->connect_error . "\n");
  }
  return $conn;
}

$input_netid = $_GET['netid'];
$input_pwd = $_GET['Password'];
$hashed_pwd = sha1($input_pwd);

session_start();
session_destroy();

// create a connection
$conn = getDB();

// do the query
$stmt = $conn->prepare("SELECT Name
                        FROM library.patron
                        WHERE NetID = ? AND Password = ?;");
$stmt->bind_param("ss", $input_netid, $hashed_pwd);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();

if(empty($name)) {
  echo "Invalid credentials.";
} else {
  session_start();
  $_SESSION["netid"]=$input_netid;
  $_SESSION["name"]=$name;
  echo "<p>Logged in as: <b>" . htmlspecialchars($_SESSION["name"]) . "</b></p>";
}

// close the sql connection
$conn->close();
?>
