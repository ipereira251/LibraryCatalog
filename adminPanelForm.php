<?php
if (isset($_SESSION["netid"])) {
if($_SESSION["netid"] === "utd000000") {
    echo "<h2><b>Check Out</b></h2><hr><br>
    <div class=\"container\">
      <form action=\"./checkOut.php\" method=\"get\">
        <div class=\"input-group mb-3 text-center\">
          <div class=\"input-group-prepend\">
            <span class=\"input-group-text\" id=\"uname\">NetID</span>
          </div>
          <input type=\"text\" class=\"form-control\" placeholder=\"NetID\" name=\"netid\" aria-label=\"netid\" aria-describedby=\"uname\">
        </div>
        <div class=\"input-group mb-3\">
          <div class=\"input-group-prepend\">
            <span class=\"input-group-text\" id=\"pwd\">ISBN </span>
          </div>
          <input type=\"text\" class=\"form-control\" placeholder=\"ISBN\" name=\"ISBN\" aria-label=\"ISBN\" aria-describedby=\"pwd\">
        </div>
        <br>
        <button type=\"submit\" class=\"button btn-success btn-lg btn-block\">Submit</button>
      </form><br>";
      echo "<h2><b>Check In</b></h2><hr><br>
    <div class=\"container\">
      <form action=\"./checkIn.php\" method=\"get\">
        <div class=\"input-group mb-3\">
          <div class=\"input-group-prepend\">
            <span class=\"input-group-text\" id=\"pwd\">ISBN </span>
          </div>
          <input type=\"text\" class=\"form-control\" placeholder=\"ISBN\" name=\"ISBN\" aria-label=\"ISBN\" aria-describedby=\"pwd\">
        </div>
        <br>
        <button type=\"submit\" class=\"button btn-success btn-lg btn-block\">Submit</button>
      </form>";
}}
      ?>