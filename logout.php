<?php
session_start();
session_destroy();
header("Location: register&login.html");
exit();
?>
