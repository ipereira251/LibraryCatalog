<?php
if (isset($_SESSION["netid"])) {
  if($_SESSION["netid"] === "utd000000") {
    echo "<a href=\"adminPanel.php\">Admin Panel</a>";
  }
}
?>