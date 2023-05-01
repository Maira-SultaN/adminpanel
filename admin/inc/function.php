<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "store";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
 function redirect($page, $time = 0)
{
    ?>
    <script>
        setTimeout(function() {
      window.location.href = "<?= $page?>";
    }, <?= $time?>);
    </script>
    <?php
}
function getMessage($msg, $sts)
{
    echo '<div class="alert alert-' . $sts . '" role="alert">
    <strong>' . $msg . ' </strong> 
    </div>';
}

?>