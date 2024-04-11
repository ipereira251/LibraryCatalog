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

if (!isset($_SESSION["netid"])) {
  header("Location: logout.php");
  exit;
}

// create a connection
$conn = getDB();

// do the query
$stmt = $conn->prepare("SELECT Title, Authors, h.ISBN, DATE(TimeIssued + INTERVAL 2 WEEK) as DueDate
                        FROM hold h, book b
                        WHERE b.ISBN = h.ISBN AND h.NetID = ?
                        ORDER BY TimeIssued DESC");
$netid = $_SESSION["netid"];
$stmt->bind_param("s", $netid);
$stmt->execute();
$result = $stmt->get_result(); // Store the result set in a variable

$num_rows = $result->num_rows;
if ($num_rows > 0) {
  echo "<table>";
echo "<tr><th>Title</th><th>Author(s)</th><th>ISBN</th><th>DueDate</th><th>Queue Position</th></tr>";
while ($row = $result->fetch_assoc()) {
  // Check if each value exists before echoing inside <td>
  echo "<tr>";
  echo "<td>" . (isset($row["Title"]) ? $row["Title"] : "") . "</td>";
  echo "<td>" . (isset($row["Authors"]) ? $row["Authors"] : "") . "</td>";
  echo "<td>" . (isset($row["ISBN"]) ? $row["ISBN"] : "") . "</td>";
  echo "<td>" . (isset($row["DueDate"]) ? $row["DueDate"] : "") . "</td>";
  echo "<td>";
  $qpos = $conn->prepare("SELECT count(*) as ct
  FROM hold h1, hold h2
  WHERE h1.NetID = ? AND h1.ISBN = ? AND h2.timeissued < h1.timeissued;");
  $isbn = $row["ISBN"];
  $qpos->bind_param("ss", $netid, $isbn);
  $qpos->execute();
  $res2 = $qpos->get_result();
  $row2 = $res2->fetch_assoc();
  echo (isset($row2["ct"]) ? $row2["ct"] : "");
  echo "</td>";
  echo "</tr>";
}
echo "</table>";

} else {
  echo "No active holds found.";
}

// close the sql connection
$conn->close();
?>
