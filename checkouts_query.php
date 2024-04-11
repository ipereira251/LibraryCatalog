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
$stmt = $conn->prepare("SELECT Title, Authors, c.ISBN, DATE(TimeIssued + INTERVAL 2 WEEK) as DueDate, isValid
                        FROM checkout c, book b
                        WHERE c.ISBN = b.ISBN AND c.NetID = ?
                        ORDER BY TimeIssued DESC");
$netid = $_SESSION["netid"];
$stmt->bind_param("s", $netid);
$stmt->execute();
$result = $stmt->get_result(); // Store the result set in a variable

$num_rows = $result->num_rows;
if ($num_rows > 0) {
  echo "<table>";
echo "<tr><th>Title</th><th>Author(s)</th><th>ISBN</th><th>DueDate</th><th>Status</th></tr>";
while ($row = $result->fetch_assoc()) {
  // Check if each value exists before echoing inside <td>
  echo "<tr>";
  echo "<td>" . (isset($row["Title"]) ? $row["Title"] : "") . "</td>";
  echo "<td>" . (isset($row["Authors"]) ? $row["Authors"] : "") . "</td>";
  echo "<td>" . (isset($row["ISBN"]) ? $row["ISBN"] : "") . "</td>";
  echo "<td>" . (isset($row["DueDate"]) ? $row["DueDate"] : "") . "</td>";
  echo "<td>";
  if (isset($row["isValid"])) {
    if ($row["isValid"] === 0) {
      echo "Old";
    } else {
      $dueDate = new DateTime($row["DueDate"]);
      if ($dueDate < new DateTime()) {
        echo "Overdue";
      } else {
        echo "Active";
      }
    }
  }  
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
