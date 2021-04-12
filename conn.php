<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="bd_url";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo 
    '<div class="toast" data-autohide="true">
            <div class="toast-header">
              <strong class="mr-auto text-primary"></strong>
              <button type="button" class="ml-2 mb-1 close" id="conn_hide">&times;</button>
            </div>
            <div class="toast-body">
              Vous etes connecte
            </div>
    </div>';
?>