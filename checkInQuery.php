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

$isbn = $_GET['ISBN'];

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
    $risbn = $row["ISBN"];
    $chk->bind_param("s", $risbn);
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

$stmt = $conn->prepare("UPDATE checkout
SET isValid = 0
WHERE ISBN = ?;");
  $stmt->bind_param("s", $isbn);
  $stmt->execute();
  echo "<br><b>Successfully returned!</b><br><br>";

  // Generate link back to search results page with user input
  $link = "http://localhost/adminPanel.php";
  echo "<a href='$link'>Back to Admin Panel</a>";
?>
