<?php

if (isset($_SESSION["name"])) {
    echo "<div class=\"container\">";
  echo "<p>Logged in as: <b>" . htmlspecialchars($_SESSION["name"]) . "</b></p>";
  echo "</div>";
} else {
    header("Location: logout.php");
    exit;
}
?>