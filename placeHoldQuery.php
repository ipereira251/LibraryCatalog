<?php
// Check if data is received
if (isset($_POST['isbn']) && isset($_POST['input'])) {
  $isbn = $_POST['isbn'];
  $input = $_POST['input'];
}
  // Function to create a sql connection.
function getDB() {
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "library";

  // Create a DB connection
  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($conn->connect_error) {
    echo "No DB connection.";
    die("Connection failed: " . $conn->connect_error . "\n");
  }
  return $conn;
}

// create a connection
$conn = getDB();

$stmt = $conn->prepare("SELECT Title, Authors, ISBN, Genres, Rating, NumPages
                          FROM book
                          WHERE ISBN = ?");

$stmt->bind_param("s", $isbn);
$stmt->execute();
$result = $stmt->get_result(); // Store the result set in a variable

$num_rows = $result->num_rows;
if ($num_rows > 0) {
  echo "<table>";
  echo "<tr><th>Title</th><th>Author(s)</th><th>ISBN</th><th>Genres</th><th>Rating</th><th>#Pages</th><th>Availability</th></tr>";
  while ($row = $result->fetch_assoc()) {
    // Check if each value exists before echoing inside <td>
    echo "<tr>";
    echo "<td>" . (isset($row["Title"]) ? $row["Title"] : "") . "</td>";
    echo "<td>" . (isset($row["Authors"]) ? $row["Authors"] : "") . "</td>";
    echo "<td>" . (isset($row["ISBN"]) ? $row["ISBN"] : "") . "</td>";
    $genres = str_replace(";", "; ", $row["Genres"]);
    echo "<td>" . $genres . "</td>";
    echo "<td>" . (isset($row["Rating"]) ? $row["Rating"] : "") . "</td>";
    echo "<td>" . (isset($row["NumPages"]) ? $row["NumPages"] : "") . "</td>";
    echo "<td>";
    $chk = $conn->prepare("SELECT count(*) as ct
                            FROM checkout
                            WHERE isValid = 1 AND ISBN = ?");
    $isbn = $row["ISBN"];
    $chk->bind_param("s", $isbn);
    $chk->execute();
    $res2 = $chk->get_result();
    $row2 = $res2->fetch_assoc();
    if ($row2["ct"] === 1) {
      echo "Unavailable";
    } else {
      echo "Available";
    }
    echo "</td>";
  }
  echo "</table>";
}

$stmt = $conn->prepare("SELECT COUNT(*) as ct FROM checkout WHERE NetID = ? AND ISBN = ? AND isValid = 1;");
  $netid = $_SESSION["netid"];
  $stmt->bind_param("ss", $netid, $isbn);
  $stmt->execute();
  $res = $stmt->get_result();
  $row = $res->fetch_assoc();
  if ($row["ct"] === 1) {
    echo "<br><b>You already have this book checked out!</b><br><br>";
  } else {
    $stmt = $conn->prepare("SELECT COUNT(*) as ct FROM hold WHERE NetID = ? AND ISBN = ?;");
$netid = $_SESSION["netid"];
$stmt->bind_param("ss", $netid, $isbn);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
if ($row["ct"] === 1) {
  echo "<br><b>You already have a hold for this book!</b><br><br>";
} else {
  $stmt = $conn->prepare("INSERT INTO hold VALUES (?, ?, default)");
  $stmt->bind_param("ss", $netid, $isbn);
  $stmt->execute();
  echo "<br><b>Hold successfully placed!</b><br><br>";
}}

  // Generate link back to search results page with user input
  $link = "http://localhost/basic_form.php?input=$input";
  echo "<a href='$link'>Back to Search Results</a>";
?>
