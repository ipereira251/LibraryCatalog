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

// create a connection
$conn = getDB();

$input = $_GET['input'];

// do the query
$searchTerm = "%".$input."%"; // Add wildcards for substring match

$stmt = $conn->prepare("SELECT Title, Authors, ISBN, Genres, Rating, NumPages
                       FROM book
                       WHERE Title LIKE ?
                       OR Authors LIKE ?
                       OR Genres LIKE ?
                       OR ISBN = ?");

$stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
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
  if($row2["ct"] === 1) {
    echo "Unavailable";
  }
  else echo "Available";
  echo "</td>";
  echo "</tr>";
}
echo "</table>";

} else {
  echo "No checked out books found.";
}

// close the sql connection
$conn->close();
?>
