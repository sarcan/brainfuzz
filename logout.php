<?php
session_start();
// Session Variabeln löschen
session_unset();
// Stop Session and redirect to login
session_destroy();
header("Location: signin.php");
exit;

?>