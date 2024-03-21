<?php
session_start();
session_destroy();
echo '<script type="text/javascript">alert("You have been Logged out.");
location="index.php";</script>';
?>